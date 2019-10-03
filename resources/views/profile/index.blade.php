@extends('layouts.appDashboard')
@section('title','| Perfil')
@section('nameTitleTemplate','Perfil')
@section('js')
<script type="text/javascript">
  $('#btn-edit-fullname').click(function(){
    $('#h3-fullname').addClass('d-none');
    $('#form-fullname').removeClass('d-none');
    $('#btn-edit-fullname').addClass('d-none');
  });
</script>
@endsection
@section('content')
<div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('template/assets/img/theme/user.jpg') }}" class="rounded-circle">
                  </a>
                </div>
                <div class="card-header">
                  <div class="col-4 ml-9 text-right">
                    <a id="btn-edit-fullname" class="text-white btn btn-sm btn-primary">Editar</a>
                  </div>
                </div>
              </div>
            </div><br>
            <div class="card-body pt-0 pt-md-6">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <br>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3 id="h3-fullname">
                  {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                </h3>

                <form action="{{route('Users.up_date',Auth::user()->slug)}}" id="form-fullname" class="d-none container form-horizontal">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nombre</label>
                        <input type="text" id="input-first-name" name='name' class="form-control form-control-alternative" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Apellido</label>
                        <input type="text" id="input-last-name" name='lastname' required class="form-control form-control-alternative" placeholder="{{Auth::user()->lastname}}" value="{{Auth::user()->lastname}}">
                      </div>
                    </div>    
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-block btn-success">Editar</button>
                    </div>
                  </div>
                </form>



                <div class="h3 mt-4 font-weight-300">
                  <i class="ni location_pin mr-2"></i>

                  @if(!Auth::user()->hasRole(0))

                  <b>{{ Auth::user()->hasRole(1)?'Profesor':'Estudiante'}} {{$matter_user->type==0?'- Coordinador':''}}  </b>
                  @else
                  <b>Administrador</b>
                  @endif
                </div>
                <div class="h5 mt-4">
                  @forelse(Auth::user()->matter_user as $item)
                  <i class="ni business_briefcase-24 mr-2"></i>Area - {{$item->matter->career->area->area}} 
                </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Carrera - {{$item->matter->career->career}}
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Unidad Curricular - {{$item->matter->matter}}
                  </div>
                  @empty
                    <h4>
                      no tiene ningun area, carrera y materia asignada.
                    </h4>
                  @endforelse
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Mi cuenta</h3>
                </div>
              <form action='{{route('profile.upData')}}'>
              	{{csrf_field()}}
                <div class="col-4 text-right">
                  <button type='submit' class="btn btn-sm btn-primary">Configurar Contraseña</button>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Informacion</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">E-mail</label>
                        <input type="email" id="input-email" name='email' class="form-control form-control-alternative" placeholder="{{ Auth::user()->email }}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-alfterpass">Contraseña Antigua</label>
                        <input type="password" name="mypassword" id="input-username" class="form-control form-control-alternative" placeholder="*********" value="">
                        <div class="text-danger">{{$errors->first('password')}}</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Nueva Contraseña</label>
                        <input type="password" name="password" id="input-username" class="form-control form-control-alternative" placeholder="*********" value="">
                        <div class="text-danger">{{$errors->first('mypassword')}}</div>
                      </div>
                    </div>
                	<div class="col-lg-6">
                    	<div class="form-group">
                        	<label class="form-control-label" for="input-confirpass">Confirme Nueva Contraseña</label>
                        	<input type="password" name="password_confirmation" id="input-username" class="form-control form-control-alternative" placeholder="*********" value="">
                      	</div>
                    </div>
                  </div>
              </form>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection