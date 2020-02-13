@extends('layouts.appDashboard')
@section('title','| Unidad Curricular '. $matter->matter)
@section('nameTitleTemplate','Unidad Curricular '. $matter->matter)
@section('headerContent')
<div class="container">
  <div class="row">
    <div class="col-xl-4 col-lg-6 pt-4 mb-4">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Asignar un Profesor</span>
            </div>
            <div class="col-auto">
              <a href="{{route('add.teacher.index',$matter->slug)}}" title data-original-title="Agregar Profesor" class='text-white'>
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
<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-12 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="card-body pt-0 pt-md-4">
          <div class="text-center">
            <h3>
              Unidad Curricular | {{ $matter->matter }}
            </h3>
            <div>
              <i class="ni education_hat mr-2"></i>
              <h5>Semestre | {{ $matter->semester }}</h5>
            </div>
            <div>
              <i class="ni education_hat mr-2"></i>
              <h5>Credito | {{ $matter->credit }}</h5>
            </div>
            <div>
              <i class="ni education_hat mr-2"></i>
              <h5>Horas</h5><hr>
              <div class="row">
                <div class="col">
                  <h5>HT <hr> {{$matter->ht}}</h5>
                </div>
                <div class="col">
                  <h5>HL <hr> {{$matter->hl}}</h5>
                </div>
                <div class="col">
                  <h5>HP <hr> {{$matter->hp}}</h5>
                </div>
              </div><hr>
            </div>
            <div class="h5 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>Carrera | {{$matter->career->career}} 
            </div>
            <div class="card-footer">
              <div class="text-center">
                <div class="row">
                  <div class="col-6">
                    <h4>Creada</h4>
                    <div class="h5 mt-4">
                      <i class="ni business_briefcase-24 mr-2"></i>{{$matter->created_at}} 
                    </div>
                  </div>
                  <div class="col-6">                        
                    <h4>Editada</h4>
                    <div class="h5 mt-4">
                      <i class="ni business_briefcase-24 mr-2"></i>{{$matter->updated_at}} 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr> <h2>Profesores de la unidad Curricular</h2> <hr>
  <div class="row">
    @forelse($teacherAll as $item)  
    <div class="col-4 order-xl-2 mb-8 mt-4 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            <a href="{{route('Matter.asignar.delete',$item->id)}}" class="btn btn-sm btn-danger mr-4">borrar</a>
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="text-center">
            <h3>
            Nombre:  {{$item->teacher->user->name}}
            </h3>
            <h3>
            Apellido:  {{$item->teacher->user->lastname}}
            </h3>
            <h4>
            Cedula:  {{$item->teacher->user->dni}}
            </h4>
            <h4>
            E-mail:  {{$item->teacher->user->email}}
            </h4>
            <div class="card-footer">
              <div class="text-center">
                <div class="row">
                  <div class="col-6">
                    <h4>Creada</h4>
                    <div class="h5 mt-4">
                      <i class="ni business_briefcase-24 mr-2"></i>{{$item->teacher->user->created_at}} 
                    </div>
                  </div>
                  <div class="col-6">                        
                    <h4>Editada</h4>
                    <div class="h5 mt-4">
                      <i class="ni business_briefcase-24 mr-2"></i>{{$item->teacher->user->updated_at}} 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty

    @endforelse

  </div>

</div>
@endsection