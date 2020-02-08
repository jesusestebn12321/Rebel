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

</script>
@endsection
@section('header_js')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')
<div class="auto-form-wrapper">
  <div class="text-muted text-center mt-2 mb-3">
    <small>Inicio sección</small></div>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="label">Username</label>
        <div class="input-group">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline"></i>
            </span>
          </div>

          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>



      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="label">Password</label>
        <div class="input-group">
          <input id="password" type="password" class="form-control" name="password" required>

          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline"></i>
            </span>
          </div>
          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group">
              <button type="submit" class="btn btn-primary my-4">Iniciar</button>      
      </div>
      <div class="form-group d-flex justify-content-between">
        <a href="#" class="text-small forgot-password text-black{{ old('remember') ? 'checked' : '' }}">Forgot Password</a>
      </div>

      <div class="text-block text-center my-3">
        <a href="{{ route('password.request') }}" class="text-small font-weight-semibold"><small>Recuperar contraseña?</small></a>
        <a href="{{url('register')}}" class="text-black text-small">Create new account</a>
      </div>
    </form>
  </div>
  @endsection