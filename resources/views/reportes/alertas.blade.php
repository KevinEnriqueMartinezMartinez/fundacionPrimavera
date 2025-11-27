@extends('layouts.app')
@section('title', 'Reporte de Alertas Críticas')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de Alertas Críticas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Actual</a></li>
                        {{-- <li class="breadcrumb-item active">Blank Page</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('reportes.alertas') }}">
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

                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-primary btn-block">Filtrar</button>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <a href="{{ url('reportes.alertas') }}" class="btn btn-secondary btn-block">Quitar filtros</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered" id="tablaAlertas">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Beneficiario</th>
                            <th>Comunidad</th>
                            <th>Puntaje</th>
                            <th>Tipo Evaluación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alertas as $a)
                            <tr>
                                <td>{{ $a->fecha }}</td>
                                <td>{{ $a->nombres }} {{ $a->apellidos }}</td>
                                <td>{{ $a->comunidad }}</td>
                                <td>{{ $a->puntajePorcentaje }}%</td>
                                <td>{{ $a->tipo }}</td>
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
    <script>
        $(document).ready(function() {
            $('#tablaAlertas').DataTable();
        });
    </script>
@endsection
