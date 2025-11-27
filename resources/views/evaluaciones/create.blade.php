@extends('layouts.app')
@section('title', 'Crear Evaluación')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Evaluación</h1>
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

                <form action="{{ route('evaluaciones.store') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label>Fecha</label>
                            <input type="datetime-local" name="fecha" class="form-control" required>
                        </div>

                        <div class="col-md-2">
                            <label>Tipo</label>
                            <select name="tipo" class="form-control" required>
                                <option value="Inicial">Inicial</option>
                                <option value="Seguimiento">Seguimiento</option>
                                <option value="Final">Final</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label>Estado</label>
                            <select name="estado" class="form-control" disabled>
                                <option value="excelente">Excelente</option>
                                <option value="bueno">Bueno</option>
                                <option value="medio">Medio</option>
                                <option value="critico">Critico</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Beneficiario</label>
                            <select name="idFicha" class="form-control" required>
                                <option value="">--Seleccione--</option>
                                @foreach ($beneficiarios as $b)
                                    <option value="{{ $b->id }}">{{ $b->nombres . ' ' . $b->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label>Dimensión</label>
                            <select id="dimension" name="idDimension" class="form-control" required>
                                <option value="">--Seleccione--</option>
                                @foreach ($dimensiones as $d)
                                    <option value="{{ $d->id }}">{{ $d->dimension }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Indicador</label>
                            <select id="indicador" name="idIndicador" class="form-control" required>
                                <option value="">--Seleccione--</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <h5>Cuestionario:</h5>
                    <div id="contenedor-preguntas"></div>

                    <hr>

                    <button type="submit" class="btn btn-primary">Guardar Evaluación</button>

                </form>

            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('#dimension').on('change', function() {
            let idDimension = $(this).val();

            $('#indicador').html('<option>Cargando...</option>');
            $('#contenedor-preguntas').html('');

            $.get('/getSindicadores/' + idDimension, function(data) {
                let html = '<option value="">--Seleccione--</option>';
                data.forEach(item => {
                    html += `<option value="${item.id}">${item.nombre}</option>`;
                });
                $('#indicador').html(html);
            });
        });


        $('#indicador').on('change', function() {
            let idIndicador = $(this).val();
            $('#contenedor-preguntas').html('Cargando preguntas...');

            $.get('/getScuestionario/' + idIndicador, function(data) {

                let html = '';

                data.forEach(p => {
                    html += `
                <div class="card mb-3">
                    <div class="card-body">

                        <label>${p.pregunta}
                            <input type="hidden" name="preguntas[]" value="${p.id}">
                        </label>

                        <div class="mt-2">`;

                    p.respuestas.forEach(r => {
                        html += `
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input respuesta-radio"
                                type="radio"
                                name="respuesta_${p.id}"
                                value="${r.id}"
                                required>
                            ${r.respuesta} <span class="badge badge-warning">${r.interpretacion}</span>
                        </label>
                    </div>
                `;
                    });

                    html += `
                        </div>
                    </div>
                </div>
            `;
                });

                $('#contenedor-preguntas').html(html);
            });
        });
    </script>
@endsection
