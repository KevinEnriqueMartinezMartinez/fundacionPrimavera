<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadMedida;

class UnidadMedidaController extends Controller
{
    public function index(){
        $unidades = UnidadMedida::all();
        return view('unidad_medidas.index', compact('unidades'));
    }

    public function create(){
        return view('unidad_medidas.create');
    }

    public function store(Request $request){
        try {
            UnidadMedida::create($request->all());
            return redirect()->route('unidad_medidas.index')->with('success', 'Unidad de Medida creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $unidad = UnidadMedida::find($id);
        return view('unidad_medidas.edit', compact('unidad'));
    }

    public function update(Request $request, $id){
        try {
            $unidad = UnidadMedida::find($id);
            $unidad->update($request->all());
            return redirect()->route('unidad_medidas.index')->with('success', 'Unidad de Medida actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            UnidadMedida::destroy($id);
            return redirect()->route('unidad_medidas.index')->with('success', 'Unidad de Medida borrada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
