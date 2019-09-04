@extends('layouts.appDashboard')
@section('title','| Profesores de  '.$career->career)
@section('nameTitleTemplate','Profesores de '.$career->career)
@section('js')

@endsection
@section('headerContent')
<div class="container">
  <div class="row">
    <div class="col-xl-4 col-lg-6 pt-4">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Añadir Profesor</span>
            </div>
            <div class="col-auto">
              <a href="#" title data-original-title="Agregar Carreras" data-target='#createCareer' data-toggle='modal' class='text-white'>
                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                  <i class="fa fa-plus"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="row">
  {{-- {{ $matter }} --}}
  @foreach($matter as $item)
  @foreach($matter_user as $items)
  @if($items->matter->career_id==$career->id)
  <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
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
      <div class="card-body pt-0 pt-md-4">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
              <br>
            </div>
          </div>
        </div>
        <div class="text-center">
          <h3>
            {{ $items->user->name }} {{ $items->user->lastname }}
          </h3>
          <div class="h5 font-weight-300">
            <i class="ni location_pin mr-2"></i>Profesor
          </div>
          <div>
            <i class="ni education_hat mr-2"></i>Unidad Curricular
          </div>
          <div>
            {{ $items->matter->matter }}
          </div>
        </div>
      </div>
    </div>
  </div>

  @endif
  @endforeach
  @endforeach
</div>

@endsection