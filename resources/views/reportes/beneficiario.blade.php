@extends('layouts.app')
@section('title', 'Historial de Beneficiario')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Historial de Evaluaciones</h1>
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

                <form method="GET" action="{{ route('reportes.beneficiario') }}">

                    <div class="row">

                        <div class="col-md-6">
                            <label>Beneficiario</label>
                            <select name="beneficiario" class="form-control" required>
                                <option value="">-- Seleccione --</option>
                                @foreach ($beneficiarios as $b)
                                    <option value="{{ $b->id }}"
                                        {{ $request->beneficiario == $b->id ? 'selected' : '' }}>
                                        {{ $b->nombres }} {{ $b->apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-primary btn-block">Buscar</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>


        @if ($request->beneficiario)

            <div class="card">
                <div class="card-body">

                    <h5>Evaluaciones de:
                        <strong>
                            {{ $evaluaciones[0]->nombres ?? '' }}
                            {{ $evaluaciones[0]->apellidos ?? '' }}
                        </strong>
                    </h5>

                    <table class="table table-bordered" id="tablaHistorial">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Puntaje</th>
                                <th>Estado</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluaciones as $e)
                                <tr>
                                    <td>{{ $e->fecha }}</td>
                                    <td>{{ $e->tipo }}</td>
                                    <td>{{ $e->puntajeBruto }}/{{ $e->puntajeMaximo }} ({{ $e->puntajePorcentaje }}%)</td>
                                    <td>{{ ucfirst($e->estado) }}</td>
                                    <td>
                                        <a href="{{ route('evaluaciones.show', $e->id) }}" class="btn btn-info btn-sm">Ver
                                            detalles</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        @endif

    </section>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#tablaHistorial').DataTable();
        });
    </script>
@endsection
