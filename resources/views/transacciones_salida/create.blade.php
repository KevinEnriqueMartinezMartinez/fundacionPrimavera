@extends('layouts.app')
@section('title','Crear Transacción de Salida')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Transacción de Salida</h1>
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
                    <form action="{{ route('transacciones_salida.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="cliente_id" class="form-label">Cliente</label>
                                <select class="form-control" id="cliente_id" name="cliente_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="articulo_id" class="form-label">Articulo</label>
                                <select class="form-control" id="articulo_id" name="articulo_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach ($articulos as $articulo)
                                    <option value="{{ $articulo->id }}">{{ $articulo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                            </div>
                            <div class="col-md-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                        </div>

                        <a href="{{ url()->previous() }}" class="btn btn-dark">Volver</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
