@extends('layouts.app')
@section('title', 'Reporte por Dimensiones')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de Dimensiones</h1>
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

                <form method="GET" action="{{ route('reportes.dimensiones') }}">

                    <div class="row">

                        <div class="col-md-4">
                            <label>Dimensión</label>
                            <select name="dimension" class="form-control">
                                <option value="">-- Todas --</option>
                                @foreach ($dimensiones as $d)
                                    <option value="{{ $d->id }}" {{ $request->dimension == $d->id ? 'selected' : '' }}>{{ $d->dimension }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-primary btn-block">Filtrar</button>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <a href="{{ route('reportes.dimensiones') }}" class="btn btn-secondary btn-block">Quitar
                                filtros</a>
                        </div>

                    </div>

                </form>

            </div>
        </div>


        <div class="card">
            <div class="card-body">

                <table class="table table-bordered" id="tablaDimensiones">
                    <thead>
                        <tr>
                            <th>Dimensión</th>
                            <th>Puntaje</th>
                            <th>Máximo</th>
                            <th>Porcentaje %</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $d)
                            <tr>
                                <td>{{ $d->dimension }}</td>
                                <td>{{ $d->puntaje }}</td>
                                <td>{{ $d->maximo }}</td>
                                <td>{{ $d->porcentaje }}%</td>
                                <td>{{ ucfirst($d->estado) }}</td>
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
        $(function() {
            $('#tablaDimensiones').DataTable();
        });
    </script>
@endsection
