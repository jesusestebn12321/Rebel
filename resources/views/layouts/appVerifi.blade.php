<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Rebel | @yield('title')</title>
  <!-- Favicon -->
  <link href="{{asset('template/assets/img/brand/blue.png')}}" rel="icon" type="image/png">
  <!-- Icons -->
  <link href="{{asset('template/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('template/assets/css/argon.css')}}" rel="stylesheet">
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Header -->
    @include('layouts.nav.navVerifi')
    <div class="header app-header py-7 py-lg-8" style="background-image: url({{ asset('template/assets/img/theme/profile-cover.jpg') }})">
        @include('layouts.header.headerVerifi')
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        @yield('content')
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" style="color:white">
    @include('layouts.footer.footerLogin')
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('template/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('template/assets/js/argon.js')}}"></script>
  <script>
  var APP_URL={!!json_encode(url('/'))!!};
  
</script>
  @yield('js')
</body>

</html>