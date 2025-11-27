<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $evaluacionesRealizadas = DB::select("SELECT COUNT(*) AS total FROM evaluaciones;")[0];
        $sumaBeneficiarios = DB::select("SELECT COUNT(*) AS total FROM fichasbeneficiarios;")[0];
        $sumaComunidades = DB::select("SELECT COUNT(*) AS total FROM comunidades;")[0];
        
    
        // indicador con mejor desempeño
        $mejoresIndicadores = DB::table('evaluaciones')
            ->join('indicadores', 'indicadores.id', 'evaluaciones.idIndicador')
            ->select('indicadores.nombre', DB::raw('AVG(puntajePorcentaje) AS promedio'))
            ->groupBy('indicadores.id')
            ->orderByDesc('promedio')
            ->limit(5)
            ->get();

        // indicador con mas riesgo
        $indicadoresRiesgo = DB::table('evaluaciones')
            ->join('indicadores', 'indicadores.id', 'evaluaciones.idIndicador')
            ->select('indicadores.nombre', DB::raw('AVG(puntajePorcentaje) AS promedio'))
            ->groupBy('indicadores.id')
            ->orderBy('promedio')
            ->limit(5)
            ->get();

        // promedio indicador
        $promedios = DB::table('evaluaciones')
            ->join('indicadores', 'indicadores.id', 'evaluaciones.idIndicador')
            ->select('indicadores.nombre', DB::raw('AVG(puntajePorcentaje) AS promedio'))
            ->groupBy('indicadores.id')
            ->get();

      
        $conteoEstados = [
            'excelente' => Evaluacion::where('estado', 'excelente')->count(),
            'medio'     => Evaluacion::where('estado', 'medio')->count(),
            'critico'   => Evaluacion::where('estado', 'critico')->count(),
        ];

        $tipos = [
            'Inicial'       => Evaluacion::where('tipo', 'Inicial')->count(),
            'Seguimiento'   => Evaluacion::where('tipo', 'Seguimiento')->count(),
            'Final'         => Evaluacion::where('tipo', 'Final')->count(),
        ];

        return view('home', compact(
            'evaluacionesRealizadas',
            'sumaBeneficiarios',
            'sumaComunidades', 
            'mejoresIndicadores',
            'indicadoresRiesgo', 
            'promedios',
            'conteoEstados',
            'tipos'
        ));
    }
 
}
