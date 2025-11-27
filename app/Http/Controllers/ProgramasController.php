<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programa;

class ProgramasController extends Controller
{
    public function index()
    {
        $programas = Programa::all();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        return view('programas.create');
    }

    public function store(Request $request)
    {
        try {
            Programa::create($request->all());
            return redirect()->route('programas.index')->with('success', 'Programa creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id)
    {
        $programa = Programa::find($id);
        return view('programas.edit', compact('programa'));
    }

    public function update(Request $request, $id)
    {
        try {
            $programa = Programa::find($id);
            $programa->update($request->all());
            return redirect()->route('programas.index')->with('success', 'Programa actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id)
    {
        try {
            Programa::destroy($id);
            return redirect()->route('programas.index')->with('success', 'Programa borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
