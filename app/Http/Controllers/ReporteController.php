<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReporteController extends Controller
{
    public function reporte_mas_vendido(){
        $reporte = DB::select("SELECT count(articulo_id) as cantidadVendido, 
                articulo.descripcion 
                FROM transacciones_salida 
                INNER JOIN articulo ON transacciones_salida.articulo_id = articulo.id 
                GROUP BY articulo_id 
                ORDER BY cantidadVendido DESC 
                LIMIT 10");
 
         $labels = [];
         $data = [];
 
         foreach ($reporte as $row) {
             $labels[] = $row->descripcion;
             $data[] = $row->cantidadVendido;
         }

        return view('reportes.MasVendidos',compact('reporte','labels','data'));
    }

}
