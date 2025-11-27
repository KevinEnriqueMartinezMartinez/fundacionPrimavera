@extends('layouts.app')
@section('title', 'Editar Pregunta')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Pregunta</h1>
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
                        <form action="{{ route('preguntas.update', $pregunta->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="idIndicador" class="form-label">Indicador</label>
                                    <select class="form-control" id="idIndicador" name="idIndicador" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($indicadores as $indicador)
                                            <option value="{{ $indicador->id }}"
                                                {{ $pregunta->idIndicador == $indicador->id ? 'selected' : '' }}>
                                                {{ $indicador->dimension->dimension . ' / ' . $indicador->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <label for="pregunta" class="form-label">Pregunta</label>
                                    <input type="text" class="form-control" id="pregunta" name="pregunta"
                                        value="{{ $pregunta->pregunta }}" autocomplete="off" required>
                                </div>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-dark">Volver</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
