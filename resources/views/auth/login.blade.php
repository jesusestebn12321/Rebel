@extends('layouts.app')
@section('title','Login')
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
  $(window).ready(function($e){
    setTimeout(function(){
      $('.alert').addClass('d-none');      
    }, 2500);
  });

</script>
@endsection
@section('header_js')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-5 col-md-7">
    <div class="card bg-secondary shadow border-0">
      <div class="card-header bg-transparent pb-5">
        <div style="max-width:6cm;min-width:6cm;margin: 0 auto">
          <img style="width: 100%" src="{{asset('logo/unerg.png')}}">
        </div>
        <div class="text-muted text-center mt-2 mb-3"><small>Inicio sección</small></div>
      </div>
      <div class="card-body px-lg-5 py-lg-5">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
              </div>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
              </div>
              <input id="password" type="password" class="form-control" name="password" required>
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="custom-control custom-control-alternative custom-checkbox">
            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
            <label class="custom-control-label" for=" customCheckLogin">
              <span class="text-muted" {{ old('remember') ? 'checked' : '' }}>Recordar</span>
            </label>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary my-4">Iniciar</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-6">
        <a href="{{ route('password.request') }}" class="text-light"><small>Recuperar contraseña?</small></a>
      </div>
      <div class="col-6 text-right">
        <a href="{{url('register')}}" class="text-light"><small>Crear Cuenta</small></a>
      </div>
    </div>
  </div>
</div>
@endsection