<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index(){
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    public function create(){
        return view('marcas.create');
    }

    public function store(Request $request){
        try {
            Marca::create($request->all());
            return redirect()->route('marcas.index')->with('success', 'Marca creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $marca = Marca::find($id);
        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, $id){
        try {
            $marca = Marca::find($id);
            $marca->update($request->all());
            return redirect()->route('marcas.index')->with('success', 'Marca actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Marca::destroy($id);
            return redirect()->route('marcas.index')->with('success', 'Marca borrada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
