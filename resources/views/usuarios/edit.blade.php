@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="idRol" class="form-label">Rol</label>
                                    <select class="form-control" id="idRol" name="idRol" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}" {{ $usuario->idRol == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password"  >
                                </div>
                            </div>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-dark">Volver</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
