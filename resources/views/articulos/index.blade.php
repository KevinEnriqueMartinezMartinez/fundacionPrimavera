@extends('layouts.app')
@section('title','Artículos')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Artículos</h1>
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
                    <a href="{{ route('articulos.create') }}" class="btn btn-primary">Agregar Artículo</a>
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

                    <table id="articulos" class="table">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Tipo Artículo</th>
                                <th>SKU</th>
                                <th>Descripción</th>
                                <th>Unidad Medida</th>
                                <th>Clase Artículo</th>
                                <th>Marca</th>
                                <th>Proveedor</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articulos as $articulo)
                            <tr>
                                <td><img src="{{ asset($articulo->imagen) }}" width="120px" height="120px" alt=""></td>
                                <td>{{ $articulo->tipoArticulo->tipo }}</td>
                                <td>{{ $articulo->sku }}</td>
                                <td>{{ $articulo->descripcion }}</td>
                                <td>{{ $articulo->unidadMedida->unidad }}</td>
                                <td>{{ $articulo->claseArticulo->clase }}</td>
                                <td>{{ $articulo->marca->marca }}</td>
                                <td>{{ $articulo->proveedor->nombre }}</td>
                                <td>{{ $articulo->precio_compra }}</td>
                                <td>{{ $articulo->precio_venta }}</td>
                                <td>
                                    <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST" style="display: inline-block;" id="deleteForm{{$articulo->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{$articulo->id}})">Eliminar</button>
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
        $('#articulos').DataTable();
    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Advertencia',
            text: "¿Estás seguro que deseas eliminar este artículo?",
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
