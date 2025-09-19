<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index(){
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create(){
        return view('proveedores.create');
    }

    public function store(Request $request){
        try {
            Proveedor::create($request->all());
            return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $proveedor = Proveedor::find($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id){
        try {
            $proveedor = Proveedor::find($id);
            $proveedor->update($request->all());
            return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Proveedor::destroy($id);
            return redirect()->route('proveedores.index')->with('success', 'Proveedor borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
