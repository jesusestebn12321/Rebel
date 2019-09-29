@extends('layouts.appDashboard')
@section('title','| Perfil')
@section('nameTitleTemplate','Perfil')
@section('content')
<div class="row">
  <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('template/assets/img/theme/user.jpg') }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div><br>
            <div class="card-body pt-0 pt-md-6">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <br>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  {{ $user->name }} {{ $user->lastname }}
                </h3>
                <div>
                  <i class="ni education_hat mr-2"></i>
                  {{ $user->matter }}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Area - 
                  {{ $user->matter }}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Carrera - 
                  {{ $user->matter }}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Unidad Curricular - 
                  {{ $user->matter }}
                </div>
              </div>
            </div>
          </div>
  </div>
</div>
@endsection