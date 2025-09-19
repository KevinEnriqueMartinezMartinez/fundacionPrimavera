<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaseArticulo;

class ClaseArticuloController extends Controller
{
    public function index(){
        $clases = ClaseArticulo::all();
        return view('clase_articulos.index', compact('clases'));
    }

    public function create(){
        return view('clase_articulos.create');
    }

    public function store(Request $request){
        try {
            ClaseArticulo::create($request->all());
            return redirect()->route('clase_articulos.index')->with('success', 'Clase Artículo creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $clase = ClaseArticulo::find($id);
        return view('clase_articulos.edit', compact('clase'));
    }

    public function update(Request $request, $id){
        try {
            $clase = ClaseArticulo::find($id);
            $clase->update($request->all());
            return redirect()->route('clase_articulos.index')->with('success', 'Clase Artículo actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            ClaseArticulo::destroy($id);
            return redirect()->route('clase_articulos.index')->with('success', 'Clase Artículo borrada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
