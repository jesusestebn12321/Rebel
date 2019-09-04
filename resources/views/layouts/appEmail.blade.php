<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Confirmacion E-mail Rebel</title>
  {{-- <link type="text/css" href="{{asset('template/assets/css/argon.css')}}" rel="stylesheet"> --}}
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
     <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6">
            <h1 class="text-white">Bienvenido/a! {{ $name }}  {{ $lastname }}</h1>
            <p class="text-lead text-light">Confirme su correo solo presione el boton de confirmacion</p>
          </div>
        </div>
      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <!-- Page content -->
  <div class="container mt--8 pb-5">
    <div class="card card-profile shadow">
      <div class="card-body pt-0 pt-md-4">
        <div class="text-center">
          <p>Gracias por registrarte en el Sistema Rebel - Tramites para las equivalencisa de nuestra universidad nacional experimental romulo gallegos.</p>
          <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>
          <hr class="my-4">
          <h3>{{ $name }}  {{ $lastname }}  </h3>
          <div class="h5 font-weight-300">
            Cedula: {{ $dni }}
          </div>
          <div class="h5 mt-4">
            Rol Academico - Creative Tim Officer
          </div>
          <hr class="my-4">
          <a class='btn btn-primary' href="{{ url('/register/verify/' . $confirmation_code) }}">
            Click para confirmar tu email
          </a>      
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="py-5">
  <div class="container">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
          &copy; 2019
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>