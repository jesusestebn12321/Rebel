<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">{{Auth::user()->name}} {{Auth::user()->lastname}}</h6>
    </div>
    <a href="{{route('profile-index')}}" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>Mi perfil</span>
    </a>
    <div class="dropdown-divider"></div>
    <a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="dropdown-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
      <i class="ni ni-user-run"></i>
      <span>Logout</span>
  </a>
</div>