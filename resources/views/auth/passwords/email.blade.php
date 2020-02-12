@extends('layouts.app')
@section('title','Restablecer Contraseña')
@section('content')
<div class="auto-form-wrapper">
  <div class="card-header bg-transparent pb-5">
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
