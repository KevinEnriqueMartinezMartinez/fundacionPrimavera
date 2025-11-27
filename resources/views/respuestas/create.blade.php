@extends('layouts.app')
@section('title', 'Crear Respuesta')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Respuesta</h1>
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
                        <h5>Respuesta para: <u>{{ $pregunta->pregunta }}</u></h5><hr>
                        <form action="{{ route('respuestas.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idPregunta" value="{{ $idPregunta }}">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="respuesta" class="form-label">Respuesta</label>
                                    <input type="text" class="form-control" id="respuesta" name="respuesta"
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="puntuacion" class="form-label">Puntuación</label>
                                    <input type="number" class="form-control" id="puntuacion" name="puntuacion"
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="interpretacion" class="form-label">Interpretación</label>
                                    <input type="text" class="form-control" id="interpretacion" name="interpretacion"
                                        autocomplete="off" required>
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
