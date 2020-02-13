@extends('layouts.appDashboard')
@section('title','| Asignar Profesor')
@section('nameTitleTemplate','Asignar Profesor')
@section('content')
<div class="container-fluid mt--8">
  <div class="row mt-5">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="text-white mb-0">Profesores</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cedula</th>
                <th scope="col">Creado</th>
                <th scope="col"></th>
              </tr>
            </thead>
            @forelse($teacher as $item)
            <tbody><tr></tr>
              <tr>
                <td>{{$item->user->id}}</td>
                <td>{!!$item->user->name!!}</td>
                <td>{!!$item->user->lastname!!}</td>
                <td>{{$item->user->dni}}</td>
                <td>{{$item->user->created_at }}</td>
                <td>
                  <a href="{{route('add.teacher.matter',[$item->user->slug,$matter->slug])}}" class="btn btn-sm btn-success">Asignar</a>
                </td>
              </tr>
            </tbody>
            @empty

            @endforelse

          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection