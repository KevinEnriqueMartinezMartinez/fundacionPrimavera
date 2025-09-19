@extends('layouts.app')
@section('title','Crear Unidad de Medida')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Unidad de Medida</h1>
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
                    <form action="{{ route('unidad_medidas.store') }}" method="POST">
                        @csrf
            
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="unidad" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="unidad" name="unidad" autocomplete="off" required>
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
