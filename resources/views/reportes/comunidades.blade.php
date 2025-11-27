@extends('layouts.app')
@section('title', 'Reporte por Comunidad')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de Comunidades</h1>
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

                <form method="GET" action="{{ route('reportes.comunidades') }}">
                    <div class="row">

                        <div class="col-md-4">
                            <label>Comunidad</label>
                            <select name="comunidad" class="form-control">
                                <option value="">-- Todas --</option>
                                @foreach ($comunidades as $c)
                                    <option value="{{ $c->id }}" {{ $request->comunidad == $c->id ? 'selected' : '' }}>
                                        {{ $c->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-primary btn-block">Filtrar</button>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <a href="{{ route('reportes.comunidades') }}" class="btn btn-secondary btn-block">Quitar
                                filtros</a>
                        </div>

                    </div>
                </form>

            </div>
        </div>


        <div class="card">
            <div class="card-body">

                <table class="table table-bordered" id="tablaComunidades">
                    <thead>
                        <tr>
                            <th>Comunidad</th>
                            <th>Beneficiarios</th>
                            <th>Evaluaciones</th>
                            <th>Promedio %</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $d)
                            <tr>
                                <td>{{ $d->comunidad }}</td>
                                <td>{{ $d->beneficiarios }}</td>
                                <td>{{ $d->evaluaciones }}</td>
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
        $(function() {
            $('#tablaComunidades').DataTable();
        });
    </script>
@endsection
