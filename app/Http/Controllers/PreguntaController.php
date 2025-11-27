<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicador;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.index', compact('preguntas'));
    }

    public function create()
    { 
        $indicadores = Indicador::all();
        return view('preguntas.create', compact('indicadores'));
    }

    public function store(Request $request){
        try {
            Pregunta::create($request->all());
            return redirect()->route('preguntas.index')->with('success', 'Pregunta creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

     public function edit($id){
        $pregunta = Pregunta::find($id);
        $indicadores = Indicador::all();
        return view('preguntas.edit', compact('pregunta', 'indicadores'));
    }

    public function update(Request $request, $id){
        try {
            $pregunta = Pregunta::find($id);
            $pregunta->update($request->all());
            return redirect()->route('preguntas.index')->with('success', 'Pregunta actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Pregunta::destroy($id);
            return redirect()->route('preguntas.index')->with('success', 'Pregunta borrada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
 
}
