<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fundación Primavera - Iniciar Sesión</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .login-page {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px 0;
      background-attachment: fixed;
      position: relative;
      overflow: hidden;
    }
    
    .login-page::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%);
      z-index: -1;
    }
    
    .login-box {
      width: 100%;
      max-width: 400px;
      transition: all 0.3s ease;
      position: relative;
      z-index: 1;
    }
    
    /* Estrellas flotantes animadas para dar profesionalidad */
    .stars {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -2;
      pointer-events: none;
    }
    
    .star {
      position: absolute;
      width: 2px;
      height: 2px;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      box-shadow: 0 0 4px rgba(255, 255, 255, 0.7);
      animation: starFloat 8s infinite linear;
    }
    
    @keyframes starFloat {
      0% {
        transform: translateY(0);
        opacity: 0;
      }
      50% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100vh);
        opacity: 0;
      }
    }
    
    @media (max-width: 576px) {
      .login-box {
        width: 90%;
      }
    }
  </style>
</head>
<body class="hold-transition login-page">

<!-- Fondo de estrellas para un efecto profesional -->
<div class="stars" id="stars"></div>

<div class="login-box animate__animated animate__fadeIn">
    @yield('content')
</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script>
  $(document).ready(function() {
    // Crear estrellas flotantes para un efecto profesional
    var stars = document.getElementById('stars');
    for (var i = 0; i < 50; i++) {
      var star = document.createElement('div');
      star.className = 'star';
      star.style.left = Math.random() * 100 + 'vw';
      star.style.top = Math.random() * 100 + 'vh';
      star.style.animationDelay = Math.random() * 8 + 's';
      stars.appendChild(star);
    }
  
    // Animación de entrada suave
    $('.login-box').hide().fadeIn(1000);
    
    // Efecto de enfoque automático al correo electrónico
    setTimeout(function() {
      $('#email').focus();
    }, 800);
    
    // Efecto de carga al enviar el formulario
    $('form').on('submit', function() {
      $('.btn-primary').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Iniciando sesión...');
    });
    
    // Efectos suaves en los inputs
    $('.form-control').on('focus', function() {
      $(this).css('transform', 'translateY(-2px)');
    }).on('blur', function() {
      $(this).css('transform', 'translateY(0)');
    });
    
    // Efecto hover para el botón de olvidó contraseña
    $('a').hover(function() {
      $(this).css('text-shadow', '0 0 5px rgba(52, 152, 219, 0.5)');
    }, function() {
      $(this).css('text-shadow', 'none');
    });
  });
</script>
</body>
</html>
