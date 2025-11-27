@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inicio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        {{-- <li class="breadcrumb-item active">Blank Page</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $sumaBeneficiarios->total }}</h3>

                            <p>Beneficiarios</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success" style="background: #575558 !important">
                        <div class="inner">
                            <h3>{{ $sumaComunidades->total }}</h3>

                            <p>Comunidades</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $evaluacionesRealizadas->total }}</h3>

                            <p>Evaluaciones Realizadas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="row">
                <div class="col-md-6">
                    <!-- evaluaciones por tipo -->
                    <div class="card">
                        <div class="card-header">Evaluaciones por Tipo</div>
                        <div class="card-body">
                            <canvas id="grafTipos"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box bg-info">
                        <div class="info-box-content">
                            <span class="info-box-text">Evaluaciones en estado: Excelente</span>
                            <span class="info-box-number">{{ $conteoEstados['excelente'] }}</span>
                        </div>
                    </div>
                    <div class="info-box bg-warning">
                        <div class="info-box-content">
                            <span class="info-box-text">Evaluaciones en estado: Medio</span>
                            <span class="info-box-number">{{ $conteoEstados['medio'] }}</span>
                        </div>
                    </div>
                    <div class="info-box bg-danger">
                        <div class="info-box-content">
                            <span class="info-box-text">Evaluaciones en estado: Crítico</span>
                            <span class="info-box-number">{{ $conteoEstados['critico'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- mejores indicadores -->
                    <div class="card">
                        <div class="card-header">Indicadores con Mejor Rendimiento</div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Indicador</th>
                                        <th>Promedio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mejoresIndicadores as $m)
                                        <tr>
                                            <td>{{ $m->nombre }}</td>
                                            <td>{{ round($m->promedio, 2) }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <!-- indicadores en riesgo -->
                    <div class="card">
                        <div class="card-header">Indicadores en Riesgo</div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Indicador</th>
                                        <th>Promedio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($indicadoresRiesgo as $r)
                                        <tr>
                                            <td>{{ $r->nombre }}</td>
                                            <td>{{ round($r->promedio, 2) }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {

            // evaluaciones por tipo
            const tipos = @json($tipos);

            new Chart($('#grafTipos'), {
                type: 'bar',
                data: {
                    labels: Object.keys(tipos),
                    datasets: [{
                        label: 'Cantidad',
                        data: Object.values(tipos)
                    }]
                }
            });
        });
    </script>
@endsection
