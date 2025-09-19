@extends('layouts.app')
@section('title','Crear Artículo')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Artículo</h1>
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
                <div class="card-body">
                    <form action="{{ route('articulos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                            </div>
                            <div class="col-md-3">
                                <label for="tipo_articulo_id" class="form-label">Tipo de Artículo</label>
                                <select class="form-control" id="tipo_articulo_id" name="tipo_articulo_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach($tiposArticulo as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" required>
                            </div>
                            <div class="col-md-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="unidad_medida_id" class="form-label">Unidad de Medida</label>
                                <select class="form-control" id="unidad_medida_id" name="unidad_medida_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach($unidadesMedida as $unidad)
                                        <option value="{{ $unidad->id }}">{{ $unidad->unidad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="clase_articulo_id" class="form-label">Clase de Artículo</label>
                                <select class="form-control" id="clase_articulo_id" name="clase_articulo_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach($clasesArticulo as $clase)
                                        <option value="{{ $clase->id }}">{{ $clase->clase }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="marca_id" class="form-label">Marca</label>
                                <select class="form-control" id="marca_id" name="marca_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="proveedor_id" class="form-label">Proveedor</label>
                                <select class="form-control" id="proveedor_id" name="proveedor_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="precio_compra" class="form-label">Precio de Compra</label>
                                <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" required>
                            </div>
                            <div class="col-md-4">
                                <label for="precio_venta" class="form-label">Precio de Venta</label>
                                <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" required>
                            </div>
                        </div>
                        <a href="{{ route('articulos.index') }}" class="btn btn-dark">Volver</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
