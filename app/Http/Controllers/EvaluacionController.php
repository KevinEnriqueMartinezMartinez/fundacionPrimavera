<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Evaluacion;
use App\Models\Dimension;
use App\Models\Beneficiario;
use App\Models\Indicador;
use App\Models\Pregunta;
use App\Models\EvaluacionRespuesta;
use DB;

class EvaluacionController extends Controller
{   
    public function index(Request $request){
        
        $beneficiarios = DB::table('fichasbeneficiarios')->get();
        $indicadores   = DB::table('indicadores')->get();
        $query = Evaluacion::with('ficha')->orderBy('id', 'desc');

        if ($request->filled('fecha_desde')) {
            $query->whereDate('fecha', '>=', $request->fecha_desde);
        }

        if ($request->filled('fecha_hasta')) {
            $query->whereDate('fecha', '<=', $request->fecha_hasta);
        }

        if ($request->filled('beneficiario')) {
            $query->where('idFicha', $request->beneficiario);
        }

        if ($request->filled('indicador')) {
            $query->where('idIndicador', $request->indicador);
        }

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        $evaluaciones = $query->get();

        return view('evaluaciones.index', compact('evaluaciones','beneficiarios','indicadores','request'));
    }

    public function create(){
        $dimensiones = Dimension::all();
        $beneficiarios = Beneficiario::all();

        return view('evaluaciones.create', compact('dimensiones', 'beneficiarios'));
    }

    public function getIndicadores(Request $request){
        $idDimension = $request->idDimension;
        return response()->json(
            Indicador::where('idDimension', $idDimension)->get()
        );
    }

    public function getPreguntas(Request $request){
        $idIndicador = $request->idIndicador;
        return response()->json(
            Pregunta::where('idIndicador', $idIndicador)->get()
        );
    } 

    public function getCuestionario($idIndicador){
        $preguntas = Pregunta::where('idIndicador', $idIndicador)->with('respuestas')->get();
        return response()->json($preguntas);
    }


    public function store(Request $request){
      
        $evaluacion = Evaluacion::create([
            'fecha'        => $request->fecha,
            'tipo'         => $request->tipo,
            'idDimension'  => $request->idDimension,
            'idFicha'      => $request->idFicha,
            'idIndicador'  => $request->idIndicador,
            'idUsuario'    => 1
        ]);

        foreach ($request->preguntas as $idPregunta) {
            EvaluacionRespuesta::create([
                'idEvaluacion' => $evaluacion->id,
                'idPregunta'   => $idPregunta,
                'idRespuesta'  => $request->input("respuesta_$idPregunta")
            ]);
        }

        $puntajeBruto = DB::table('evaluaciones_respuestas AS er')
            ->join('respuestas AS r', 'r.id', 'er.idRespuesta')
            ->where('er.idEvaluacion', $evaluacion->id)
            ->sum('r.puntuacion');

        // es la suma del puntaje maximo de cada pregunta respondida
        $puntajeMaximo = DB::table('evaluaciones_respuestas AS er')
            ->join('preguntas AS p', 'p.id', 'er.idPregunta')
            ->where('er.idEvaluacion', $evaluacion->id)
            ->sum(DB::raw('(SELECT MAX(r2.puntuacion) FROM respuestas r2 WHERE r2.idPregunta = p.id)'));

        $puntajePorcentaje = $puntajeMaximo > 0 ? round(($puntajeBruto / $puntajeMaximo) * 100, 2) : 0;

        if ($puntajePorcentaje >= 80) {
            $estado = 'excelente';
        } elseif ($puntajePorcentaje >= 50) {
            $estado = 'medio';
        } else {
            $estado = 'critico';
        }

        $update = Evaluacion::find($evaluacion->id);
        $update->puntajeBruto = $puntajeBruto;
        $update->puntajeMaximo = $puntajeMaximo;
        $update->puntajePorcentaje = $puntajePorcentaje;
        $update->estado = $estado;
        $update->save();

        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación creada correctamente');
    }

    public function show($id){
        $evaluacion = Evaluacion::findOrFail($id);
        $respuestas = EvaluacionRespuesta::where('idEvaluacion', $id)
            ->with(['pregunta', 'respuesta'])
            ->get();

        return view('evaluaciones.show', compact('evaluacion', 'respuestas'));
    }

    public function edit($id){
        $evaluacion = Evaluacion::findOrFail($id);
        $dimensiones = Dimension::all();
        $beneficiarios = Beneficiario::all();

        // $respuestasGuardadas = EvaluacionRespuesta::where('idEvaluacion', $id)->get();
        $respuestasGuardadas = EvaluacionRespuesta::where('idEvaluacion', $id)->get()->keyBy('idPregunta');

        return view('evaluaciones.edit', compact(
            'evaluacion',
            'dimensiones',
            'beneficiarios',
            'respuestasGuardadas'
        ));
    }

    public function update(Request $request, $id){
        $evaluacion = Evaluacion::findOrFail($id);

        $evaluacion->update([
            'fecha'        => $request->fecha,
            'tipo'         => $request->tipo,
            'idDimension'  => $request->idDimension,
            'idFicha'      => $request->idFicha,
            'idIndicador'  => $request->idIndicador
        ]);

        EvaluacionRespuesta::where('idEvaluacion', $id)->delete();

        foreach ($request->preguntas as $idPregunta) {
            EvaluacionRespuesta::create([
                'idEvaluacion' => $id,
                'idPregunta'   => $idPregunta,
                'idRespuesta'  => $request->input("respuesta_$idPregunta")
            ]);
        }

        $puntajeBruto = DB::table('evaluaciones_respuestas AS er')
            ->join('respuestas AS r', 'r.id', 'er.idRespuesta')
            ->where('er.idEvaluacion', $id)
            ->sum('r.puntuacion');

        $puntajeMaximo = DB::table('evaluaciones_respuestas AS er')
            ->join('preguntas AS p', 'p.id', 'er.idPregunta')
            ->where('er.idEvaluacion', $id)
            ->sum(DB::raw('(SELECT MAX(r2.puntuacion) FROM respuestas r2 WHERE r2.idPregunta = p.id)'));

        $puntajePorcentaje = $puntajeMaximo > 0 ? round(($puntajeBruto / $puntajeMaximo) * 100, 2) : 0;

        if ($puntajePorcentaje >= 80) {
            $estado = 'excelente';
        } elseif ($puntajePorcentaje >= 50) {
            $estado = 'medio';
        } else {
            $estado = 'critico';
        }

        $update = Evaluacion::find($evaluacion->id);
        $update->puntajeBruto = $puntajeBruto;
        $update->puntajeMaximo = $puntajeMaximo;
        $update->puntajePorcentaje = $puntajePorcentaje;
        $update->estado = $estado;
        $update->save();
        
        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación actualizada correctamente');
    }
}
