@extends('layouts.app')
@section('title','Register')
@section('js')
<script>
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
@section('content')
<div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>sign up with credentials</small>
              </div>
              <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                    </div>
                    <input id="dni" type="number" placeholder="Nombre" class="form-control" name="dni" value="{{ old('dni') }}" required autofocus>
                    @if ($errors->has('dni'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dni') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bold-right"></i></span>
                    </div>
                    <input id="name" type="text" placeholder="Nombre" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bold-right"></i></span>
                    </div>
                    <input id="lastname" type="text" placeholder="Apellido" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                    @if ($errors->has('lastname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
{{-- en produccion --}}
               {{--  <div class="form-group">
                    <select id="career_id" class='form-control' value='0' name="career_id" size='1'>
                      <option value="0">Carreras</option>
                      @foreach($career as $item)
                        <option value="{{$item->id}}">{{$item->career}}</optio>
                      @endforeach                   
                    </select>
                </div>
                <div class="form-group">
                   <select id="area_id" class='form-control d-none' value='0' name="area_id" size='1'></select>
                </div> --}}
                
                {{--  --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" type="email" placeholder="E-mail"  class="form-control" name="email" value="{{ old('email') }}" required>
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
                    <input id="password" placeholder="Contraseña" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password-confirm" placeholder="Confirme Contraseña" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Create account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
