@extends('layouts.app')
@section('title','Editar Dimensión')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Dimensión</h1>
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
                    <form action="{{ route('dimensiones.update', $dimension->id) }}" method="POST">
                        @csrf
                        @method('PUT')
            
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="dimension" class="form-label">Dimensión</label>
                                <input type="text" class="form-control" id="dimension" name="dimension" value="{{ $dimension->dimension }}" required>
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
