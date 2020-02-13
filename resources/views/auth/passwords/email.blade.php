@extends('layouts.app')
@section('title','Restablecer Contraseña')
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
          $('#div_career_public').removeClass('d-none');
          html='<option value="0">Carreras</option>';
          for (var i = 0; response.length>i ; i++){ 
            html+='<option value="'+response[i].slug+'">'+response[i].id+' - '+response[i].career+'</option>';
          }
          $('#career_public').html(html);
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
    }, 3000);
  });

</script>
@endsection
@section('content')
@include('layouts.header.headerLogin')
<div class="auto-form-wrapper">
  <div class="card-header bg-transparent pb-5">
    <div style="max-width:6cm;min-width:6cm;margin: 0 auto">
      <img style="width: 100%" src="{{asset('logo/unerg.png')}}">
    </div>
    <div class="text-muted text-center mt-2 mb-3"><h3>Restableser Contraseña</h3></div>
  </div>
  <div class="card-body px-lg-5 py-lg-5">
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="label">E-mail </label>

        <div class="input-group">

          <input id="email" placeholder="Dirección de E-Mail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
          <div class="input-group-append">
          <span class="input-group-text">
            <i class="fa fa-check-circle"></i>
          </span>
        </div>
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif

        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-sm btn-primary btn-block" >
          Enviar link
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
