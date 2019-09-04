<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h2 mb-0 text-white text-uppercase d-lg-inline-block font-italic" href="#">@yield('nameTitleTemplate')</a>
      <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="truearia-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('template/assets/img/theme/user.jpg') }}">
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}  {{Auth::user()->lastname}}</span>
              </div>
            </div>
          </a>
          @include('layouts.nav.menu')
        </li>
      </ul>
  </div>
</nav>