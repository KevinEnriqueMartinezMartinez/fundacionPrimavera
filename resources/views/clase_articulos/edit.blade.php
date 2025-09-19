@extends('layouts.app')
@section('title','Editar Clase Artículo')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Clase Artículo</h1>
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
                    <form action="{{ route('clase_articulos.update', $clase->id) }}" method="POST">
                        @csrf
                        @method('PUT')
            
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="clase" class="form-label">Clase</label>
                                <input type="text" class="form-control" id="clase" name="clase" value="{{ $clase->clase }}" required>
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
