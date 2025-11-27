<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Rol;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create(){
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request){
        try {
            User::create([
                'idRol' => $request->idRol,
                'name'   => $request->name,
                'email'  => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $usuario = User::find($id);
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id){
        try {
            $usuario = User::findOrFail($id);

            $data = [
                'idRol' => $request->idRol,
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $usuario->update($data);

            return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            User::destroy($id);
            return redirect()->route('usuarios.index')->with('success', 'Usuario borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
