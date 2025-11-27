<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\Programa;
use App\Models\Comunidad;

class BeneficiariosController extends Controller
{
    public function index(){
        $beneficiarios = Beneficiario::all();
        return view('beneficiarios.index', compact('beneficiarios'));
    }

    public function create(){
        $programas = Programa::all();
        $comunidades = Comunidad::all();
        return view('beneficiarios.create', compact('programas', 'comunidades'));
    }

    public function store(Request $request){
        try {
            Beneficiario::create($request->all());
            return redirect()->route('beneficiarios.index')->with('success', 'Beneficiario creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $beneficiario = Beneficiario::find($id);
        $programas = Programa::all();
        $comunidades = Comunidad::all();
        return view('beneficiarios.edit', compact('beneficiario', 'programas', 'comunidades'));
    }

    public function update(Request $request, $id){
        try {
            $beneficiario = Beneficiario::find($id);
            $beneficiario->update($request->all());
            return redirect()->route('beneficiarios.index')->with('success', 'Beneficiario actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Beneficiario::destroy($id);
            return redirect()->route('beneficiarios.index')->with('success', 'Beneficiario borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
