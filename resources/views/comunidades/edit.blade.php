@extends('layouts.app')
@section('title','Editar Comunidad')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Comunidad</h1>
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
                    <form action="{{ route('comunidades.update', $comunidad->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $comunidad->nombre }}" required>
                            </div>
                             <div class="col-md-3">
                                <label for="idDistrito" class="form-label">Distrito</label>
                                <select class="form-control" id="idDistrito" name="idDistrito" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach ($distritos as $distrito)
                                    <option value="{{ $distrito->id }}" {{ $comunidad->idDistrito == $distrito->id ? 'selected' : '' }}>{{ $distrito->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-dark">Volver</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
