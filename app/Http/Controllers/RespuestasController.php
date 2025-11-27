<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respuesta;
use App\Models\Pregunta;

class RespuestasController extends Controller
{
    public function index(Request $request){
        $idPregunta = $request->idPregunta;
        $pregunta = Pregunta::find($idPregunta);
        $respuestas = Respuesta::where('idPregunta', $idPregunta)->get();
        return view('respuestas.index', compact('respuestas', 'pregunta'));
    }

    public function create(Request $request){
        $idPregunta = $request->idPregunta;
        $pregunta = Pregunta::find($idPregunta);
        return view('respuestas.create', compact('idPregunta', 'pregunta'));
    }

    public function store(Request $request){
        try {
            Respuesta::create($request->all());
            return redirect()->route('respuestas.index', ['idPregunta' => $request->idPregunta])->with('success', 'Respuesta creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $respuesta = Respuesta::find($id);
        return view('respuestas.edit', compact('respuesta'));
    }

    public function update(Request $request, $id){
        try {
            $respuesta = Respuesta::find($id);
            $respuesta->update($request->all());
            return redirect()->route('respuestas.index', ['idPregunta' => $request->idPregunta])->with('success', 'Respuesta actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            $respuesta = Respuesta::find($id);
            $idPregunta = $respuesta->idPregunta;
            Respuesta::destroy($id);
            return redirect()->route('respuestas.index', ['idPregunta' => $idPregunta])->with('success', 'Respuesta borrada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
