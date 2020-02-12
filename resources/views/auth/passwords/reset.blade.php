@extends('layouts.app')
@section('title','restableser contraseña')
@section('content')
<div class="auto-form-wrapper">
    <div class="card-header bg-transparent pb-5">
        <div class="text-muted text-center mt-2 mb-3">
            <h3>Restableser Contraseña</h3>
        </div>
    </div>
    
    <div class="card-body px-lg-5 py-lg-5">
        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-12 control-label">Dirrección de E-Mail</label>
            <div class="input-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
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

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col control-label">Contraseña</label>

            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" required>
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-check-circle"></i>
                  </span>
                </div>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col control-label">Confirmar Contraseña</label>
            <div class="input-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-check-circle"></i>
                  </span>
                </div>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <button type="submit" class="btn btn-sm btn-block btn-primary">
                    Restableser Contraseña
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
