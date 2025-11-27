@extends('layouts.app')
@section('title', 'Indicadores')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de Indicadores (Promedios)</h1>
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

                <form method="GET" action="{{ route('reportes.indicadores') }}">
                    <div class="row">

                        <div class="col-md-4">
                            <label>Ordenar por</label>
                            <select name="orden" class="form-control">
                                <option value="desc" {{ $request->orden == 'desc' ? 'selected' : '' }}>Mejor desempeño
                                    primero</option>
                                <option value="asc" {{ $request->orden == 'asc' ? 'selected' : '' }}>Peor desempeño
                                    primero
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-primary btn-block">Aplicar</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered" id="tablaIndicadores">
                    <thead>
                        <tr>
                            <th>Indicador</th>
                            <th>Promedio %</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $d)
                            <tr>
                                <td>{{ $d->nombre }}</td>
                                <td>{{ $d->promedio }}%</td>
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
            $('#tablaIndicadores').DataTable();
        });
    </script>
@endsection
