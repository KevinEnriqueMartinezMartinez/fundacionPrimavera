@extends('layouts.app')
@section('title', 'Evaluaciones')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de Evaluaciones</h1>
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

                <form method="GET" action="{{ route('evaluaciones.index') }}">
                    <div class="row">

                        <div class="col-md-3">
                            <label>Fecha Desde</label>
                            <input type="date" name="fecha_desde" class="form-control"
                                value="{{ $request->fecha_desde }}">
                        </div>

                        <div class="col-md-3">
                            <label>Fecha Hasta</label>
                            <input type="date" name="fecha_hasta" class="form-control"
                                value="{{ $request->fecha_hasta }}">
                        </div>

                        <div class="col-md-3">
                            <label>Beneficiario</label>
                            <select name="beneficiario" class="form-control">
                                <option value="">-- Todos --</option>
                                @foreach ($beneficiarios as $b)
                                    <option value="{{ $b->id }}"
                                        {{ $request->beneficiario == $b->id ? 'selected' : '' }}>
                                        {{ $b->nombres . ' ' . $b->apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Indicador</label>
                            <select name="indicador" class="form-control">
                                <option value="">-- Todos --</option>
                                @foreach ($indicadores as $i)
                                    <option value="{{ $i->id }}"
                                        {{ $request->indicador == $i->id ? 'selected' : '' }}>
                                        {{ $i->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-md-3">
                            <label>Estado</label>
                            <select name="estado" class="form-control">
                                <option value="">-- Todos --</option>
                                <option value="excelente" {{ $request->estado == 'excelente' ? 'selected' : '' }}>Excelente
                                </option>
                                <option value="bueno" {{ $request->estado == 'bueno' ? 'selected' : '' }}>Bueno</option>
                                <option value="medio" {{ $request->estado == 'medio' ? 'selected' : '' }}>Medio</option>
                                <option value="critico" {{ $request->estado == 'critico' ? 'selected' : '' }}>Crítico
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Tipo</label>
                            <select name="tipo" class="form-control">
                                <option value="">-- Todos --</option>
                                <option value="Inicial" {{ $request->tipo == 'Inicial' ? 'selected' : '' }}>Inicial
                                </option>
                                <option value="Seguimiento" {{ $request->tipo == 'Seguimiento' ? 'selected' : '' }}>
                                    Seguimiento</option>
                                <option value="Final" {{ $request->tipo == 'Final' ? 'selected' : '' }}>Final</option>
                            </select>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <a href="{{ route('evaluaciones.index') }}" class="btn btn-secondary btn-block">Quitar Filtros</a>
                        </div>

                    </div>

                </form>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table" id="evaluaciones">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Beneficiario</th>
                            <th>Tipo</th>
                            <th>Puntaje</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($evaluaciones as $e)
                            <tr>
                                <td>{{ $e->fecha }}</td>
                                <td>{{ $e->ficha->nombres }} {{ $e->ficha->apellidos }}</td>
                                <td>{{ $e->tipo }}</td>
                                <td>{{ $e->puntajeBruto }} / {{ $e->puntajeMaximo }} ({{ $e->puntajePorcentaje }}%)</td>
                                <td>{{ ucfirst($e->estado) }}</td>
                                <td>
                                    <a href="{{ route('evaluaciones.show', $e->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('evaluaciones.edit', $e->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#evaluaciones').DataTable();
        });
    </script>
@endsection
