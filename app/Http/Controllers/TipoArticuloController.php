<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoArticulo;

class TipoArticuloController extends Controller
{
    public function index(){
        $tipos = TipoArticulo::all();
        return view('tipo_articulos.index', compact('tipos'));
    }

    public function create(){
        return view('tipo_articulos.create');
    }

    public function store(Request $request){
        try {
            TipoArticulo::create($request->all());
            return redirect()->route('tipo_articulos.index')->with('success', 'Tipo de Artículo creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $tipo = TipoArticulo::find($id);
        return view('tipo_articulos.edit', compact('tipo'));
    }

    public function update(Request $request, $id){
        try {
            $tipo = TipoArticulo::find($id);
            $tipo->update($request->all());
            return redirect()->route('tipo_articulos.index')->with('success', 'Tipo de Artículo actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            TipoArticulo::destroy($id);
            return redirect()->route('tipo_articulos.index')->with('success', 'Tipo de Artículo borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
