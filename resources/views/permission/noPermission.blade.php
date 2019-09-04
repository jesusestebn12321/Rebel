@extends('layouts.appDashboard')
@section('title','| noPermission')
@section('nameTitleTemplate','Error404')
@section('header')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hola {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">Ups! al parecer no tienes permisos para utilizar esta
                    función...<br>Pagina No permitida para este el usuario {{Auth::user()->name}}, consulta tus derechos dentro del sistema.
                Tal vez deberías </p>
            <a href="{{url('/home')}}" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
@endsection
