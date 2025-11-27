<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReporteController extends Controller
{
   
    public function alertasCriticas(Request $request){
        $query = DB::table('evaluaciones as e')
            ->join('fichasbeneficiarios as f', 'f.id', '=', 'e.idFicha')
            ->leftJoin('comunidades as c', 'c.id', '=', 'f.idComunidad')
            ->select(
                'e.fecha',
                'f.nombres',
                'f.apellidos',
                'c.nombre as comunidad',
                'e.puntajePorcentaje',
                'e.estado',
                'e.tipo'
            )
            ->where('e.estado', 'critico');

        if ($request->fecha_desde) {
            $query->where('e.fecha', '>=', $request->fecha_desde);
        }
        if ($request->fecha_hasta) {
            $query->where('e.fecha', '<=', $request->fecha_hasta);
        }

        $alertas = $query->orderBy('e.fecha', 'desc')->get();

        return view('reportes.alertas', compact('alertas', 'request'));
    }

    public function evaluacionesTecnicos(Request $request){
        $query = DB::table('evaluaciones as e')
            ->join('users as u', 'u.id', '=', 'e.idUsuario')
            ->select(
                'u.name as tecnico',
                DB::raw('COUNT(e.id) as total'),
                DB::raw('ROUND(AVG(e.puntajePorcentaje),2) as promedio'),
                DB::raw('SUM(e.estado="critico") as criticos')
            )
            ->groupBy('u.id');

        if ($request->tecnico) {
            $query->where('u.id', $request->tecnico);
        }

        $datos = $query->get();

        $tecnicos = DB::table('users')->where('idRol','2')->get();

        return view('reportes.tecnicos', compact('datos','request','tecnicos'));
    }

    public function indicadores(Request $request){
        $query = DB::table('evaluaciones as e')
            ->join('indicadores as i', 'i.id', '=', 'e.idIndicador')
            ->select(
                'i.nombre',
                DB::raw('ROUND(AVG(e.puntajePorcentaje),2) as promedio')
            )
            ->groupBy('i.id');

        if ($request->orden == 'asc') {
            $query->orderBy('promedio', 'asc');
        } else {
            $query->orderBy('promedio', 'desc');
        }

        $datos = $query->get();

        return view('reportes.indicadores', compact('datos','request'));
    }

    public function reporteComunidades(Request $request){
        $query = DB::table('comunidades as c')
            ->leftJoin('fichasbeneficiarios as f', 'f.idComunidad', '=', 'c.id')
            ->leftJoin('evaluaciones as e', 'e.idFicha', '=', 'f.id')
            ->select(
                'c.nombre as comunidad',
                DB::raw('COUNT(DISTINCT f.id) as beneficiarios'),
                DB::raw('COUNT(e.id) as evaluaciones'),
                DB::raw('ROUND(AVG(e.puntajePorcentaje),2) as promedio')
            )
            ->groupBy('c.id');

        if ($request->comunidad) {
            $query->where('c.id', $request->comunidad);
        }

        $datos = $query->get();
        $comunidades = DB::table('comunidades')->get();

        return view('reportes.comunidades', compact('datos','request','comunidades'));
    }

    public function reporteDimensiones(Request $request){
        $query = DB::table('evaluaciones as e')
            ->join('indicadores as i', 'i.id', '=', 'e.idIndicador')
            ->join('dimensiones as di', 'di.id', '=', 'i.idDimension')
            ->select(
                'di.dimension as dimension',
                DB::raw('ROUND(AVG(e.puntajeBruto),2) as puntaje'),
                DB::raw('ROUND(AVG(e.puntajeMaximo),2) as maximo'),
                DB::raw('ROUND(AVG(e.puntajePorcentaje),2) as porcentaje'),
                DB::raw('MAX(e.estado) as estado')
            )
            ->groupBy('di.id');

        if ($request->dimension) {
            $query->where('di.id', $request->dimension);
        }

        $datos = $query->get();
        $dimensiones = DB::table('dimensiones')->get();

        return view('reportes.dimensiones', compact('datos','dimensiones','request'));
    }

    public function reporteBeneficiario(Request $request){
        $beneficiarios = DB::table('fichasbeneficiarios')->get();
        $evaluaciones = [];

        if ($request->beneficiario) {
            $evaluaciones = DB::table('evaluaciones as e')
                ->where('e.idFicha', $request->beneficiario)
                ->join('fichasbeneficiarios as f', 'f.id', '=', 'e.idFicha')
                ->select(
                    'e.id',
                    'e.fecha',
                    'e.tipo',
                    'e.puntajeBruto',
                    'e.puntajeMaximo',
                    'e.puntajePorcentaje',
                    'e.estado',
                    'f.nombres',
                    'f.apellidos'
                )
                ->orderBy('e.fecha', 'desc')
                ->get();
        }

        return view('reportes.beneficiario', compact('beneficiarios','evaluaciones','request'));
    }


}