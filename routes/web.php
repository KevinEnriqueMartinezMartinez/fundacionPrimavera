<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DimensionesController;
use App\Http\Controllers\IndicadoresController;
use App\Http\Controllers\ProgramasController;
use App\Http\Controllers\ComunidadesController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\RespuestasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    if(auth()->check()){
        return redirect()->route('home');
    }else{
        return redirect()->route('login');
    }
});

Auth::routes();

Route::group(['middleware' => ['auth'] ], function(){
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('dimensiones', DimensionesController::class);
    Route::resource('indicadores', IndicadoresController::class);
    Route::resource('programas', ProgramasController::class);
    Route::resource('comunidades', ComunidadesController::class);
    Route::resource('preguntas', PreguntaController::class);
    Route::resource('beneficiarios', BeneficiariosController::class);
    Route::get('respuestas/p/{idPregunta}', [RespuestasController::class, 'index']);
    Route::resource('respuestas', RespuestasController::class);
    Route::resource('usuarios', UsuariosController::class);
    Route::get('evaluacion-crear', [EvaluacionController::class, 'create']);
    Route::resource('evaluaciones', EvaluacionController::class);
    Route::get('getSindicadores/{idDimension}', [EvaluacionController::class, 'getIndicadores']);
    Route::get('getScuestionario/{idIndicador}', [EvaluacionController::class, 'getCuestionario']);
    Route::get('/indicadores-riesgo', [HomeController::class, 'IndicadoresRiesgo']);
    Route::get('/evaluaciones-por-indicador', [HomeController::class, 'EvaluacionesPorIndicador']);
    Route::get('/porcentaje-logro', [HomeController::class, 'PorcentajeLogro']);
    //reportes
    Route::get('reportes/alertas', [ReporteController::class, 'alertasCriticas'])->name('reportes.alertas');
    Route::get('/reportes/tecnicos', [ReporteController::class, 'evaluacionesTecnicos'])->name('reportes.tecnicos');
    Route::get('/reportes/indicadores', [ReporteController::class, 'indicadores'])->name('reportes.indicadores');
    Route::get('/reportes/dimensiones', [ReporteController::class, 'reporteDimensiones'])->name('reportes.dimensiones'); // este query esta mal
    Route::get('/reportes/comunidades', [ReporteController::class, 'reporteComunidades'])->name('reportes.comunidades');
    Route::get('/reportes/beneficiario', [ReporteController::class, 'reporteBeneficiario'])->name('reportes.beneficiario');



});