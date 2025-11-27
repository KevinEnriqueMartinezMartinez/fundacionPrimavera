@extends('layouts.app')
@section('title','Beneficiarios')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Beneficiarios</h1>
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
                    <a href="{{ route('beneficiarios.create') }}" class="btn btn-primary">Agregar Beneficiario</a>    
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

                    <table id="tipo_articulos" class="table">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Fecha Nacimiento</th>
                                <th>Genero</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida</th>
                                <th>Programa</th>
                                <th>Comunidad</th>
                                <th>Distrito</th>
                                <th>Municipio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beneficiarios as $beneficiario)
                            <tr>
                                <td>{{ $beneficiario->nombres }}</td>
                                <td>{{ $beneficiario->apellidos }}</td>
                                <td>{{ $beneficiario->fechaNacimiento }}</td>
                                <td>{{ $beneficiario->genero }}</td>
                                <td>{{ $beneficiario->fechaIngreso }}</td>
                                <td>{{ $beneficiario->fechaSalida }}</td>
                                <td>{{ $beneficiario->programa->nombre }}</td>
                                <td>{{ $beneficiario->comunidad->nombre }}</td>
                                <td>{{ $beneficiario->comunidad->distrito->nombre }}</td>
                                <td>{{ $beneficiario->comunidad->distrito->municipio->nombre }}</td>
                                <td>
                                    <a href="{{ route('beneficiarios.edit', $beneficiario->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('beneficiarios.destroy', $beneficiario->id) }}" method="POST" style="display: inline-block;" id="deleteForm{{$beneficiario->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{$beneficiario->id}})">Eliminar</button>
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
        $('#tipo_articulos').DataTable();
    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Advertencia',
            text: "¿Estás seguro que desea eliminar este beneficiario?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm'+id).submit();
            }
        });
    }
</script>
@endsection
