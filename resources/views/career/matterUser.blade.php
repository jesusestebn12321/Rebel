@extends('layouts.appDashboard')
@section('title','| Carreras '.$career->career)
@section('nameTitleTemplate','Carrera '.$career->career)
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
              <span class="h2 font-weight-bold mb-0">Añadir Unidad curricular</span>
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
  @forelse($matter as $item)
  <input type="hidden" value="" id="id">
  <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0 pt-4">
    <div class="card card-profile shadow">
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
          <a href="#" onclick="edit()" data-target='#editCareer' data-toggle='modal'  id="btn-1_" class="btn btn-sm btn-info text-lg mr-4">Editar</a>
          <a href="#" class="btn btn-sm btn-danger float-right text-lg">Borrar</a>
        </div>
        <h1><span class="fa fa-tv"></span> 
          {{ $item->matter }}<span></span> 
          <input type="hidden" id="EditCareer" value="">
        </h1>
        <h2><span class="fa fa-tv"></span> 
          Vercion: {{ $item->version }}<span></span> 
          <input type="hidden" id="EditCareer" value="">
        </h2>
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center ml-3 mt-md-5">
              <div>
                <div class="d-flex justify-content-between">
                  <h2>Contenidos</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">

          <div class="text-center">
            <div class='row'>
              
            @forelse($item->content as $items)
            {{-- <hr> --}}
            <div class='col-4'>
              <div class="h5 mt-4">
                <h3>Titulo</h3> {{ $items->title }}<span id="labelEditArea"></span>
                <input type="hidden" id='EditAreaI' value="">
              </div> 
              <div class="h5 mt-4">
                <h3>Contenido</h3> {{ $items->content }}<span id="labelEditArea"></span>
                <input type="hidden" id='EditAreaI' value="">
              </div>  
            </div>
            {{-- <hr> --}}
            @empty

          
              <font class='center'>No existen registros</font>
           
         @endforelse
            </div>
          </div>
          <div class="text-center">
            <div>
              <hr class="my-4">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                <div>
                  <span class="heading">Registro Creado</span>
                  <span class="description" id='labelCreate'>{{ $item->created_at }}</span>
                </div>
                <div>
                  <span class="heading">Registro Editado</span>
                  <span class="description" id='labelEdit'>{{ $item->updated_at }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 @empty

          
              <font class='center'>No existen registros</font>
           
         @endforelse
</div>

@endsection