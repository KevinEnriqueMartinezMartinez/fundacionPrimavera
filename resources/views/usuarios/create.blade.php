@extends('layouts.app')
@section('title', 'Crear Usuario')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Usuario</h1>
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
                        <form action="{{ route('usuarios.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">

                                <div class="col-md-3">
                                    <label for="rol_id" class="form-label">Rol</label>
                                    <select class="form-control" id="rol_id" name="rol_id" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                                </div>

                                <div class="col-md-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                                </div>

                                <div class="col-md-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                                </div>

                                <div class="col-md-3">
                                    <label for="password_confirmation" class="form-label">Repetir Contraseña</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required autocomplete="off">
                                </div>

                            </div>

                            <a href="{{ route('usuarios.index') }}" class="btn btn-dark">Volver</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $("#password, #password_confirmation").on("input", function() {
                let pass = $("#password").val();
                let confirm = $("#password_confirmation").val();

                if (pass !== confirm) {
                    document.getElementById("password_confirmation")
                        .setCustomValidity("Las contraseñas no coinciden");
                } else {
                    document.getElementById("password_confirmation")
                        .setCustomValidity("");
                }
            });

        });
    </script>
@endsection
