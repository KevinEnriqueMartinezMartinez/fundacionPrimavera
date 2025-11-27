@extends('layouts.app')
@section('title', 'Editar Indicador')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Indicador</h1>
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
                        <form action="{{ route('indicadores.update', $indicador->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="idDimension" class="form-label">Dimensión</label>
                                    <select class="form-control" id="idDimension" name="idDimension" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($dimensiones as $dimension)
                                            <option value="{{ $dimension->id }}"
                                                {{ $dimension->id == $indicador->idDimension ? 'selected' : '' }}>
                                                {{ $dimension->dimension }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="nombre" class="form-label">Indicador</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $indicador->nombre }}" required>
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
