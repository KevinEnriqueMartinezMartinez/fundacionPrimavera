@extends('layouts.app')
@section('title', 'Editar Evaluación')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Evaluación</h1>
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

                <form action="{{ route('evaluaciones.update', $evaluacion->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label>Fecha</label>
                            <input type="datetime-local" name="fecha" class="form-control"
                                value="{{ date('Y-m-d\TH:i', strtotime($evaluacion->fecha)) }}" required>
                        </div>

                        <div class="col-md-2">
                            <label>Tipo</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="Inicial" {{ $evaluacion->tipo == 'Inicial' ? 'selected' : '' }}>Inicial
                                </option>
                                <option value="Seguimiento" {{ $evaluacion->tipo == 'Seguimiento' ? 'selected' : '' }}>
                                    Seguimiento</option>
                                <option value="Final" {{ $evaluacion->tipo == 'Final' ? 'selected' : '' }}>Final</option>
                            </select>
                        </div>
                        {{-- @dd($evaluacion) --}}
                        <div class="col-md-2">
                            <label>Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="excelente" {{ $evaluacion->estado == 'excelente' ? 'selected' : '' }}>
                                    Excelente</option>
                                <option value="bueno" {{ $evaluacion->estado == 'bueno' ? 'selected' : '' }}>Bueno</option>
                                <option value="medio" {{ $evaluacion->estado == 'medio' ? 'selected' : '' }}>Medio</option>
                                <option value="critico" {{ $evaluacion->estado == 'critico' ? 'selected' : '' }}>Crítico
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Beneficiario</label>
                            <select name="idFicha" class="form-control" required>
                                @foreach ($beneficiarios as $b)
                                    <option value="{{ $b->id }}"
                                        {{ $evaluacion->idFicha == $b->id ? 'selected' : '' }}>
                                        {{ $b->nombres . ' ' . $b->apellidos }}
                                    </option>
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
                                    <option value="{{ $d->id }}"
                                        {{ $evaluacion->idDimension == $d->id ? 'selected' : '' }}>
                                        {{ $d->dimension }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Indicador</label>
                            <select id="indicador" name="idIndicador" class="form-control" required>
                                <option value="">Cargando...</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <h5>Cuestionario</h5>
                    <div id="contenedor-preguntas">Cargando preguntas...</div>

                    <hr>

                    <a href="{{ url()->previous() }}" class="btn btn-dark">Volver</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>

                </form>

            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let respuestasPrevias = @json($respuestasGuardadas);

        $(document).ready(function() {

            let idDimension = $('#dimension').val();
            let indicadorActual = '{{ $evaluacion->idIndicador }}';

            // Cargar indicadores y marcar el que ya estaba seleccionado
            $.get('/getSindicadores/' + idDimension, function(data) {

                let html = '<option value="">--Seleccione--</option>';

                data.forEach(item => {
                    html += `<option value="${item.id}" ${item.id == indicadorActual ? 'selected' : ''}>
                        ${item.nombre}
                     </option>`;
                });

                $('#indicador').html(html);

                // Cargar cuestionario automáticamente
                if (indicadorActual) {
                    cargarCuestionario(indicadorActual);
                }
            });

        });

        // Si cambia la dimensión
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

        // Si cambia indicador manualmente
        $('#indicador').on('change', function() {
            let idIndicador = $(this).val();
            cargarCuestionario(idIndicador);
        });

        // Función para cargar preguntas + respuestas + marcar seleccionados
        function cargarCuestionario(idIndicador) {

            $('#contenedor-preguntas').html('Cargando preguntas...');

            $.get('/getScuestionario/' + idIndicador, function(data) {

                let html = '';

                data.forEach(p => {
                    html += `
            <div class="card mb-3"><div class="card-body">
                <label>${p.pregunta}
                    <input type="hidden" name="preguntas[]" value="${p.id}">
                </label>

                <div class="mt-2">`;

                    p.respuestas.forEach(r => {

                        let checked = "";

                        if (respuestasPrevias[p.id] && respuestasPrevias[p.id].idRespuesta == r
                            .id) {
                            checked = "checked";
                        }

                        html += `
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input"
                               type="radio"
                               name="respuesta_${p.id}"
                               value="${r.id}"
                               ${checked}
                               required>

                        ${r.respuesta}
                        <span class="badge badge-warning">${r.interpretacion}</span>
                    </label>
                </div>`;
                    });

                    html += `
                </div>
            </div></div>`;
                });

                $('#contenedor-preguntas').html(html);
            });
        }
    </script>

@endsection
