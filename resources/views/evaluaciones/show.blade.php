@extends('layouts.app')
@section('title', 'Detalle Evaluación')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalle de Evaluación #{{ $evaluacion->id }}</h1>
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

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4"><strong>Fecha:</strong> {{ $evaluacion->fecha }}</div>
                    <div class="col-md-2"><strong>Tipo:</strong> {{ $evaluacion->tipo }}</div>
                    <div class="col-md-2"><strong>Estado:</strong> {{ $evaluacion->estado }}</div>
                    <div class="col-md-4"><strong>Beneficiario:</strong> {{ $evaluacion->ficha->nombres }} {{ $evaluacion->ficha->apellidos }}</div>
                </div>

                <hr>

                <h5>Respuestas:</h5>

                @foreach ($respuestas as $r)
                    <div class="card mb-2">
                        <div class="card-body">
                            <strong>{{ $r->pregunta->pregunta }}</strong>
                            <br>
                            Respuesta: {{ $r->respuesta->respuesta }}
                            <br>
                            Interpretación: <span class="badge badge-warning">{{ $r->respuesta->interpretacion }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-dark">Volver</a>
            </div>
        </div>
    </section>

@endsection
