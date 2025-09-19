<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaseArticuloController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\TipoArticuloController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TransaccionSalidaController;
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
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('clase_articulos', ClaseArticuloController::class);
    Route::resource('unidad_medidas', UnidadMedidaController::class);
    Route::resource('tipo_articulos', TipoArticuloController::class);
    Route::resource('marcas', MarcaController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('articulos', ArticuloController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('transacciones_salida', TransaccionSalidaController::class);
    // Ruta reportes
    Route::get('reporte_mas_vendidos', [ReporteController::class, 'reporte_mas_vendido']);

});