<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dimension;

class DimensionesController extends Controller
{
    public function index(){
        $dimensiones = Dimension::all();
        return view('dimensiones.index', compact('dimensiones'));
    }

    public function create(){
        return view('dimensiones.create');
    }

    public function store(Request $request){
        try {
            Dimension::create($request->all());
            return redirect()->route('dimensiones.index')->with('success', 'Dimensión creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $dimension = Dimension::find($id);
        return view('dimensiones.edit', compact('dimension'));
    }

    public function update(Request $request, $id){
        try {
            $dimension = Dimension::find($id);
            $dimension->update($request->all());
            return redirect()->route('dimensiones.index')->with('success', 'Dimensión actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Dimension::destroy($id);
            return redirect()->route('dimensiones.index')->with('success', 'Dimensión borrada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
