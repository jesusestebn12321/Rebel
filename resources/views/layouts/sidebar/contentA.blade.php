          <li class="nav-item dropdown">
            <a class="nav-link font-italic" data-toggle='dropdown' aria-expanded='false'  href="#">
              <i class="ni ni-single-02 text-blue"></i> Usuarios
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('Users.index')}}" class="dropdown-item">
                  <i class="fa fa-users text-blue"></i><p>Estudiantes</p>
                </a>
                <div class='dropdown-divider'></div>
                <a href="{{route('Teacher.index')}}" class="dropdown-item">
                  <i class="fa fa-graduation-cap text-blue"></i><p>Profesores</p>
                </a>
              
            </div>


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
            <a class="nav-link font-italic" href="#!">
              <i class="ni ni-briefcase-24 text-red"></i> Direcciones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-italic" href="#!">
              <i class="ni ni-badge text-success"></i> Departamentos
            </a>
          </li>
          