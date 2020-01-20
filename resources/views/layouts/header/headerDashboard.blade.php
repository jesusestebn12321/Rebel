<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 60px; background-image: url({{ asset('template/assets/img/theme/profile-cover.jpg') }}); background-size: cover; background-position: center top;">
  <span class="mask bg-gradient-default opacity-8"></span>
  @if (url()->current()==url('/'))
  <div class="container-fluid align-items-center">
    <div class="header-body">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <h1 class="display-3 text-white" style='text-align: center'>¡Bienvenido/a
          {{Auth::user()->name}}! </h1>
          <hr class='bg-white display-3 col-2'>
          <p class="text-white mt-0 mb-5" style='text-align: center'>Sistema de equivalencias <b class='display-4'>"Rebel"</b>,  gestor de Contenidos de unidades curriculares</p>

          @if(Auth::user()->hasRole(2) && !isset($matter_user))  
          <p class="text-white mt-0 mb-5" style='text-align: center'>Rellene su perfil academico</p>
          @endif


        </div>
      </div>
    </div>
  </div>
  @else
  <div class="container-fluid">
    <div class="header-body">
      <div class="row">
        <div class="col-xl-12 col-lg-12">
          @if (session('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
          </div>
          @endif
          @if (Session::has('messages'))
          <div class='alert alert-danger'>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>{{ Session::get('messages') }}</p>
          </div>
          @endif
          @if (Session::has('success'))
          <div class='alert alert-success'>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>{{ Session::get('success') }}</p>
          </div>
          @endif
          @yield('headerContent')
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
