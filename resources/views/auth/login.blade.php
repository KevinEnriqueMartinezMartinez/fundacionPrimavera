@extends('layouts.login')
@section('content')

<style>
    body {
        background-image: url("{{ asset('img/background1.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }

     .card {
        background: rgba(255, 255, 255, 0.15); /* Transparencia */
        border-radius: 16px;
        backdrop-filter: blur(10px); /* Desenfoque */
        -webkit-backdrop-filter: blur(10px); /* Soporte para Safari */
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        border: 1px solid rgba(255, 255, 255, 0.18);
        padding: 2rem;
    }

    .login-card-body {
        color: #000; /* Asegura contraste con el fondo */
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid #ccc;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #007bff;
        background-color: rgba(255, 255, 255, 1);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .text-center img {
        filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.2));
    }
</style>

<div class="text-center mb-4">
    <img src="{{ asset('img/logofundacionprimavera.jpg') }}" alt="Logo Fundación Primavera" class="mb-2" style="width: 100px;">
    <h4 class="mb-0" style="color: rgb(242, 246, 247)">Fundación Primavera</h4>
</div>

  <div class="card">
    <div class="card-body login-card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <!-- maneja los errores desde el controlado en formato de session-->
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> --}}
      
    </div>
</div>
@endsection
