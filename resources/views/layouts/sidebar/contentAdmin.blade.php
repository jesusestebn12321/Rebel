<li class="nav-item dropdown">
  <a class="nav-link font-italic" data-toggle='dropdown' aria-expanded='false'  href="#">
    <i class="ni ni-single-02 text-blue"></i> Usuarios
  </a>
  <ul class="navbar-nav">
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <li class="nav-item">
        <a href="{{route('Users.index')}}" class="nav-link font-italic dropdown-item">
          <i class="fa fa-users text-blue"></i>Estudiantes
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('Teacher.index')}}" class=" nav-link font-italic dropdown-item">
          <i class="fa fa-graduation-cap text-blue"></i>Profesores
        </a>
      </li>                  
    </div>
  </ul>
</li>
<li class="nav-item">
  <a class="nav-link font-italic" href="{{route('University.index')}}">
    <i class="ni ni-shop text-orange"></i> Universidad
  </a>
</li>
<li class="nav-item">
  <a class="nav-link font-italic" href="{{route('Areas.index')}}">
    <i class="ni ni-tv-2 text-pink"></i> Areas
  </a>
</li>
<li class="nav-item">
  <a class="nav-link font-italic" href="{{route('Careers.index')}}">
    <i class="ni ni-hat-3 text-info"></i> Carreras
  </a>
</li>
<li class="nav-item">
  <a class="nav-link font-italic" href="{{route('Matters.index')}}">
    <i class="ni ni-book-bookmark text-indigo"></i> Unidades Curriculares
  </a>
</li>     
<li class="nav-item">
  <a class="nav-link font-italic" target="_blank" href="{{route('telescope')}}">
    <i class="ni ni-badge text-red"></i> Vitacora
  </a>
</li>
<!--<li class="nav-item">
  <a class="nav-link font-italic" href="#!">
    <i class="ni ni-badge text-success"></i> Departamentos
  </a>
</li>-->          