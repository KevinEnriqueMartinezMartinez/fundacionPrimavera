<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiarios;

class BeneficiarioController extends Controller
{
    public function index()
    {
        $beneficiarios = Beneficiarios::all();
        return view('clientes.index', compact('beneficiarios'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        try {
            Beneficiarios::create($request->all());
            return redirect()->route('clientes.index')->with('success', 'Beneficiario creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id)
    {
        $beneficiarios = Beneficiarios::find($id);
        return view('clientes.edit', compact('beneficiarios'));
    }

    public function update(Request $request, $id)
    {
        try {
            $beneficiarios = Beneficiarios::find($id);
            $beneficiarios->update($request->all());
            return redirect()->route('clientes.index')->with('success', 'Beneficiario actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id)
    {
        try {
            Beneficiarios::destroy($id);
            return redirect()->route('clientes.index')->with('success', 'Beneficiario borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
