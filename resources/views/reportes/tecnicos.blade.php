@extends('layouts.app')
@section('title', 'Reporte por Técnico')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')


    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Evaluaciones por Técnico</h1>
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

                    <form method="GET" action="{{ route('reportes.tecnicos') }}">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Técnico</label>
                                <select name="tecnico" class="form-control">
                                    <option value="">-- Todos --</option>
                                    @foreach ($tecnicos as $t)
                                        <option value="{{ $t->id }}"
                                            {{ $request->tecnico == $t->id ? 'selected' : '' }}>
                                            {{ $t->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 d-flex align-items-end">
                                <button class="btn btn-primary btn-block">Filtrar</button>
                            </div>

                            <div class="col-md-3 d-flex align-items-end">
                                <a href="{{ route('reportes.tecnicos') }}" class="btn btn-secondary btn-block">Quitar
                                    filtros</a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered" id="tablaTecnicos">
                        <thead>
                            <tr>
                                <th>Técnico</th>
                                <th>Total Evaluaciones</th>
                                <th>Promedio %</th>
                                <th>Casos Críticos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $d)
                                <tr>
                                    <td>{{ $d->tecnico }}</td>
                                    <td>{{ $d->total }}</td>
                                    <td>{{ $d->promedio }}%</td>
                                    <td>{{ $d->criticos }}</td>
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
                $('#tablaTecnicos').DataTable();
            });
        </script>
    @endsection
