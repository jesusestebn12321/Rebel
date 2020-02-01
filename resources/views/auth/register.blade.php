@extends('layouts.app')
@section('title','Register')
@include('layouts.modales.PDF.pdfPublic')

@section('js')
<script type="text/javascript">
  var area_public_slug=$('#area_public_slug');
  var html='';
  area_public_slug.click(function(){
    if(area_public_slug.val()!=0){
      $.ajax({
        type: "GET",
        url: APP_URL+"/CareerPublic/"+area_public_slug.val(),
        dataType: "json"
        ,success: function (response) {
          console.log('success');

          $('#div_career_public').removeClass('d-none');
          html='<option value="0">Carreras</option>';
          for (var i = 0; response.length>i ; i++){ 
            html+='<option value="'+response[i].slug+'">'+response[i].id+' - '+response[i].career+'</option>';
          }
          $('#career_public').html(html);
          //$('body > div > div.header.pb-8.pt-5.pt-lg-8.d-flex.align-items-center > div > div > div > div > div > div').append('<div class="col mb-6 pt-5 mb-xl-0 alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p>Exito</p></div>');


        }
      });
    }
  });
  $('#career_public').click(function(){
    if($('#career_public').val()!=0){
      $('#button_download').removeClass('d-none');
    }
  });

  $('#career_id').click(function(){
    var carrera=$('#career_id');
    var area=$('#area_id');
    address(carrera,area);
  });
  function address(atr1,atr2){
    if(atr1.val()!=0){
      $(atr2).html(' <option value="0">Area</option>');
      atr2.removeClass('d-none');
      $.ajax({
        method: "GET",
            url: APP_URL+"/Area/"+atr1.val(),
            dataType: "json",
            success: function (response) {
              for (var i = response.length - 1; i >= 0; i--) {
                $(atr2).append('<option value="'+response[i].id+'">'+response[i].area+'</optio>');   
              }
            }
      });
      return true;
    }else{
      atr2.addClass('d-none');
      atr2.val(0);
      return false;
    }
  }
</script>
@endsection
@section('header_js')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
<div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Datos personales para crear un usuario</small>
              </div>
              <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                
                {{ csrf_field() }}
                
                <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-6">
                        <div class="input radios">
                          <input type="radio" name="rol" id="students" value="students"/>
                          <label for="students" class="students">Estudiante</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="input radios">
                          <input type="radio" name="rol" id="teacher" value="teacher"/>
                          <label for="teacher" class="teacher">Profesor</label> 
                        </div>
                      </div>
                    </div>
                    @if ($errors->has('rol'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rol') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>

                <hr>
                
                <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                    </div>
                    <input id="dni" type="number" placeholder="Cedula" class="form-control" name="dni" value="{{ old('dni') }}" required autofocus>
                  </div>
                  @if ($errors->has('dni'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dni') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bold-right"></i></span>
                    </div>
                    <input id="name" type="text" placeholder="Nombre" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                  </div>
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bold-right"></i></span>
                    </div>
                    <input id="lastname" type="text" placeholder="Apellido" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                  </div>
                  @if ($errors->has('lastname'))
                      <span class="help-block">
                          <strong>{{ $errors->first('lastname') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" type="email" placeholder="E-mail"  class="form-control" name="email" value="{{ old('email') }}" required>
                  </div>
                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" placeholder="Contraseña" type="password" class="form-control" name="password" required>
                  </div>
                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>

                
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password-confirm" placeholder="Confirme Contraseña" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6 offset-md-4">
                      <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
                      @if ($errors->has('g-recaptcha-response'))
                          <span class="invalid-feedback" style="display: block;">
                              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                          </span>
                      @endif
                  </div>

                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Crear cuenta</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
