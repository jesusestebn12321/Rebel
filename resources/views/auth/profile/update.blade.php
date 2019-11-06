@extends('layouts.appDashboard')
@section('title','| Perfil')
@section('nameTitleTemplate','Perfil')
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
                  <br><hr>
                </div>
              </div>
            </div><br>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <br>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>
                  @if(!Auth::user()->hasRole(1))
                  {{ Auth::user()->hasRole(3)?  'Profesor':'Estudiante' }} 
                  @else
                  Administrador
                  @endif()
                </div>
                @if(!Auth::user()->hasRole(1))
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Area - 
                    <select>
                      <option></option>
                    </select>
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Carrera - 
                    <select>
                      <option></option>
                    </select>
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Unidad Curricular - 
                    <select>
                      <option></option>
                    </select>
                  </div>
                @else
                @endif()
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
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nombre</label>
                        <input type="text" id="input-first-name" name='name' class="form-control form-control-alternative" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Apellido</label>
                        <input type="text" id="input-last-name" name='lastname' class="form-control form-control-alternative" placeholder="{{Auth::user()->lastname}}" value="{{Auth::user()->lastaname}}">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection