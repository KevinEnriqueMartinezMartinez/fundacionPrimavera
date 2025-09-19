<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaccionSalida;
use App\Models\Cliente;
use App\Models\Articulo;

class TransaccionSalidaController extends Controller
{
    public function index()
    {
        $transacciones = TransaccionSalida::all();
        return view('transacciones_salida.index', compact('transacciones'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $articulos = Articulo::all();
        return view('transacciones_salida.create', compact('clientes', 'articulos'));
    }

    public function store(Request $request){
        try {
            TransaccionSalida::create($request->all());
            return redirect()->route('transacciones_salida.index')->with('success', 'Transacción de salida creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
 
}
