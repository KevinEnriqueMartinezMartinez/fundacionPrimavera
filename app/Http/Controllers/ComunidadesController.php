<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Distrito;

class ComunidadesController extends Controller
{
    public function index(){
        $comunidades = Comunidad::all();
        return view('comunidades.index', compact('comunidades'));
    }

    public function create(){
        $distritos = Distrito::all();
        return view('comunidades.create', compact('distritos'));
    }

    public function store(Request $request){
        try {
            Comunidad::create($request->all());
            return redirect()->route('comunidades.index')->with('success', 'Comunidad creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $comunidad = Comunidad::find($id);
        $distritos = Distrito::all();
        return view('comunidades.edit', compact('comunidad', 'distritos'));
    }

    public function update(Request $request, $id){
        try {
            $comunidad = Comunidad::find($id);
            $comunidad->update($request->all());
            return redirect()->route('comunidades.index')->with('success', 'Comunidad actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Comunidad::destroy($id);
            return redirect()->route('comunidades.index')->with('success', 'Comunidad borrada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
