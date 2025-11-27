@extends('layouts.app')
@section('title', 'Crear Beneficiario')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Beneficiario</h1>
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
                        <form action="{{ route('beneficiarios.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="fechaIngreso" class="form-label">Fecha Ingreso</label>
                                    <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso"
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="nombres" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres"
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="genero" class="form-label">Genero</label>
                                    <select id="genero" name="genero" class="form-control form-select" required>
                                        <option value="">Seleccione un género</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="idPrograma" class="form-label">Programa</label>
                                    <select class="form-control" id="idPrograma" name="idPrograma" required>
                                        <option value="">Seleccione un programa</option>
                                        @foreach ($programas as $programa)
                                            <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="idComunidad" class="form-label">Comunidad</label>
                                    <select class="form-control" id="idComunidad" name="idComunidad" required>
                                        <option value="">Seleccione una comunidad</option>
                                        @foreach ($comunidades as $comunidad)
                                            <option value="{{ $comunidad->id }}">{{ $comunidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="fechaSalida" class="form-label">Fecha Salida</label>
                                    <input type="date" class="form-control" id="fechaSalida" name="fechaSalida"
                                        autocomplete="off">
                                </div> 
                                <div class="col-md-3">
                                    <label for="dui" class="form-label">DUI</label>
                                    <input type="text" class="form-control" id="dui" name="dui"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="nit" class="form-label">NIT</label>
                                    <input type="text" class="form-control" id="nit" name="nit"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="nombre_responsable" class="form-label">Nombre del Responsable</label>
                                    <input type="text" class="form-control" id="nombre_responsable"
                                        name="nombre_responsable" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="apellido_responsable" class="form-label">Apellido del Responsable</label>
                                    <input type="text" class="form-control" id="apellido_responsable"
                                        name="apellido_responsable" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="dui_responsable" class="form-label">DUI del Responsable</label>
                                    <input type="text" class="form-control" id="dui_responsable"
                                        name="dui_responsable" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="telefono_responsable" class="form-label">Teléfono del Responsable</label>
                                    <input type="text" class="form-control" id="telefono_responsable"
                                        name="telefono_responsable" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="correo_responsable" class="form-label">Correo del Responsable</label>
                                    <input type="email" class="form-control" id="correo_responsable"
                                        name="correo_responsable" autocomplete="off">
                                </div>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-dark">Volver</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
