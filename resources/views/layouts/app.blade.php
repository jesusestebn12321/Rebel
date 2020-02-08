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
  <link href="{{asset('template/assets/vendor/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="plugins/iconfonts/mdi/css/materialdesignicons.min.css">
  <!-- end Icons -->
  <!-- style -->
  <link type="text/css" href="{{asset('template/assets/css/argon.css')}}" rel="stylesheet">
  <link type="text/css" href="{{asset('plugins/css/main.css')}}" rel="stylesheet">
  <link type="text/css" href="{{asset('plugins/css/login.css')}}" rel="stylesheet">
  <!-- end style -->
  @yield('header_js')
</head>
<body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              @yield('content')
              @include('layouts.footer.footerLogin')
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="{{asset('template/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/assets/js/argon.js')}}"></script>
  <script>
    var APP_URL={!!json_encode(url('/'))!!};
  </script>
  @yield('js')
</body>
</html>


    
  