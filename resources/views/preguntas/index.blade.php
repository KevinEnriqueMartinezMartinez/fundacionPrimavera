@extends('layouts.app')
@section('title', 'Preguntas')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Preguntas</h1>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('preguntas.create') }}" class="btn btn-primary">Agregar Pregunta</a>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif

                        <table id="proveedores" class="table">
                            <thead>
                                <tr>
                                    <th>Pregunta</th>
                                    <th>Indicador</th>
                                    <th>Dimensión</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($preguntas as $pregunta)
                                    <tr>
                                        <td>{{ $pregunta->pregunta }}</td>
                                        <td>{{ $pregunta->indicador->nombre }}</td>
                                        <td>{{ $pregunta->indicador->dimension->dimension }}</td>
                                        <td>
                                            <a href="{{ url('respuestas/p/' . $pregunta->id) }}"
                                                class="btn btn-sm btn-success">Respuestas</a>
                                            <a href="{{ route('preguntas.edit', $pregunta->id) }}"
                                                class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST"
                                                style="display: inline-block;" id="deleteForm{{ $pregunta->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete({{ $pregunta->id }})">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <script>
        $(document).ready(function() {
            $('#proveedores').DataTable();
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Advertencia',
                text: "¿Estás seguro que desea eliminar esta pregunta?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }
    </script>
@endsection
