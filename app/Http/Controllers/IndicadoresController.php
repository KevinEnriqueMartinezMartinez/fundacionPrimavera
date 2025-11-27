<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicador;
use App\Models\Dimension;

class IndicadoresController extends Controller
{
    public function index()
    {
        $indicadores = Indicador::all();
        return view('indicadores.index', compact('indicadores'));
    }

    public function create()
    {
        $dimensiones = Dimension::all();
        $indicadores = Indicador::all();
        return view('indicadores.create', compact('dimensiones', 'indicadores'));
    }

    public function store(Request $request){
        try {
            Indicador::create($request->all());
            return redirect()->route('indicadores.index')->with('success', 'Indicador creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

     public function edit($id){
        $indicador = Indicador::find($id);
        $dimensiones = Dimension::all();
        return view('indicadores.edit', compact('indicador', 'dimensiones'));
    }

    public function update(Request $request, $id){
        try {
            $indicador = Indicador::find($id);
            $indicador->update($request->all());
            return redirect()->route('indicadores.index')->with('success', 'Indicador actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Indicador::destroy($id);
            return redirect()->route('indicadores.index')->with('success', 'Indicador borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
 
}
