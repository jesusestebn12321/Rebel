@extends('layouts.appDashboard')
@section('title','| Perfil')
@section('nameTitleTemplate','Perfil')
@section('content')
<div class="row">
  <div class="col-xl-8 order-xl-2 mb-5 mb-xl-0 table-responsive">
    <table class="table align-items-center table-dark table-flush">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Codigo</th>
          <th scope="col">Verción</th>
          <th scope="col">Unidad Curricular</th>
          <th scope="col">Nª contenido</th>
          <th scope="col">Created_at</th>
          <th scope="col">Updated_at</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      @forelse($matter_student as $item)
         <tr>
          <td>{{$item->id}}</td>
          <td>{{ $item->matter->slug }}</td>
          <td>{{$item->matter->version}}</td>
          <td>{{$item->matter->matter}}</td>
          <td>{{$item->matter->content->count()}}</td>
          <td>{{$item->matter->created_at}}</td>
          <td>{{$item->matter->updated_at}}</td>
        </tr>

      @empty
        <tr><td>No hay nada</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
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
          <div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i>Estudiante </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection