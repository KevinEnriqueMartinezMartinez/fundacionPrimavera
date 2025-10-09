@extends('layouts.login')
@section('content')

<style>
    body {
        background-image: url("{{ asset('img/background1.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        font-family: 'Source Sans Pro', sans-serif;
        position: relative;
    }
    
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.3) 100%);
        z-index: -1;
    }

    .card {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.18);
        padding: 0;
        width: 380px;
        max-width: 100%;
        margin: 0 auto;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        transform: translateY(-5px);
    }

    .card-header {
        background: rgba(52, 73, 94, 0.9);
        padding: 25px;
        text-align: center;
        border: none;
        position: relative;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .card-header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
        z-index: 0;
    }
    
    .card-header img {
        width: 80px;
        height: 80px;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 4px;
        background-color: white;
        margin-bottom: 15px;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }
    
    .card-header img:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    
    .card-header h3 {
        color: #fff;
        margin: 0;
        font-weight: 600;
        font-size: 1.5rem;
        position: relative;
        z-index: 1;
    }

    .login-card-body {
        padding: 30px 25px;
        color: #fff;
        position: relative;
        z-index: 1;
    }
    
    .login-card-body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
        z-index: -1;
        border-radius: 0 0 16px 16px;
    }

    .form-control {
        height: 48px;
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 8px;
        padding: 10px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        font-weight: 400;
    }

    .form-control:focus {
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.25);
        border: none;
        background-color: #fff;
        transform: translateY(-2px);
    }

    .input-group-text {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-left: none;
        color: #555;
        border-radius: 0 8px 8px 0;
        width: 50px;
        display: flex;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    
    .input-group-text .fas {
        font-size: 1.1rem;
        color: #3498db;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background: linear-gradient(45deg, #3498db, #2980b9);
        border: none;
        height: 48px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        transition: all 0.3s ease;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
    }
    
    .btn-primary::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: all 0.6s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #2980b9, #3498db);
        box-shadow: 0 6px 15px rgba(52, 152, 219, 0.4);
        transform: translateY(-3px);
    }
    
    .btn-primary:hover::before {
        left: 100%;
    }
    
    .btn-primary:active {
        transform: translateY(0);
    }
    
    .remember-me {
        display: flex;
        align-items: center;
    }
    
    .remember-me input {
        margin-right: 8px;
        accent-color: #3498db;
        height: 16px;
        width: 16px;
    }
    
    .remember-me label {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
    }
    
    .invalid-feedback {
        font-size: 0.85rem;
        padding: 5px 10px;
        background-color: rgba(220, 53, 69, 0.1);
        border-radius: 4px;
        margin-top: 5px;
        border-left: 3px solid #dc3545;
    }
</style>

  <div class="card animate__animated animate__fadeIn">
    <div class="card-header">
        <img src="{{ asset('img/logofundacionprimavera.jpg') }}" alt="Logo Fundación Primavera" class="img-fluid">
        <h3>Fundación Primavera</h3>
    </div>
    <div class="card-body login-card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-4">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">
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
        <div class="input-group mb-4">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
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
        <div class="row mb-4">
          <div class="col-8">
            <div class="remember-me">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary btn-block">
              <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
      <div class="text-center mt-4">
        <a href="#" style="color: #3498db; text-decoration: none; font-size: 0.9rem; font-weight: 500; transition: all 0.3s ease;">
          <i class="fas fa-key mr-1"></i> ¿Olvidó su contraseña?
        </a>
      </div>
      
    </div>
    <div class="card-footer text-center py-3" style="background: rgba(0,0,0,0.1); border-top: 1px solid rgba(255,255,255,0.1);">
      <small style="color: rgba(255,255,255,0.7);">
        <i class="far fa-copyright mr-1"></i> {{ date('Y') }} Fundación Primavera - Todos los derechos reservados
      </small>
    </div>
</div>
@endsection
