@extends('layouts.app')
@section('title', 'Crear Pregunta')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Pregunta</h1>
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
                        <form action="{{ route('preguntas.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="idIndicador" class="form-label">Indicador</label>
                                    <select class="form-control" id="idIndicador" name="idIndicador" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($indicadores as $indicador)
                                            <option value="{{ $indicador->id }}">
                                                {{ $indicador->dimension->dimension.' / '.$indicador->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-9">
                                    <label for="pregunta" class="form-label">Pregunta</label>
                                    <input type="text" class="form-control" id="pregunta" name="pregunta"
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
