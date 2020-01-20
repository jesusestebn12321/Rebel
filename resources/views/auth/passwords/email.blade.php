@extends('layouts.app')
@section('title','Restablecer Contraseña')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-5 col-md-7">
    <div class="card bg-secondary shadow border-0">
      <div class="card-header bg-transparent pb-5">
        <div class="text-muted text-center mt-2 mb-3"><small>Restableser Contraseña</small></div>
      </div>
      <div class="card-body px-lg-5 py-lg-5">
      <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                  {{ csrf_field() }}
          
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
              </div>
                <input id="email" placeholder="Dirección de E-Mail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
             
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-sm btn-primary">
                Enviar link
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
