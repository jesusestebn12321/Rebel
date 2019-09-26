@extends('layouts.appDashboard')
@section('title','| Unidad Curricular '. $matter->matter)
@section('nameTitleTemplate','Unidad Curricular '. $matter->matter)
@section('js')
<script type="text/javascript">
  function edit1(arg){
      $('#edit2_'+arg).toggleClass('d-none');
      $('#edit1_'+arg).toggleClass('d-none');
      $('#title'+arg).toggleClass('d-none');
      $('#content'+arg).toggleClass('d-none');

  }
  function edit2(arg){
      $('#edit2_'+arg).toggleClass('d-none');
      $('#edit1_'+arg).toggleClass('d-none');
      $('#title'+arg).toggleClass('d-none');
      $('#content'+arg).toggleClass('d-none');
  }


</script>
@endsection
@section('headerContent')
<div class="container">
  <div class="row">
    <div class="col-xl-4 col-lg-6 pt-4">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Crear un contenido</span>
            </div>
            <div class="col-auto">
              <a href="#" title data-original-title="Agregar contenido" data-target='#createContent' data-toggle='modal' class='text-white'>
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
@include('layouts.modales.content.modalCreateContent')
@endsection
@section('content')
<div class="container-fluid mt--8">
      <div class="row">
      	@forelse($content as $item)
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="card card-profile shadow">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="{{route('Contents.delete',$item->slug)}}" class="btn btn-sm btn-danger mr-4">borrar</a>
                
                <a href="#" id="edit1_{{$item->id}}" onclick="edit1({{$item->id}})" class="btn btn-sm btn-default float-right">Editar</a>
                <form action="{{route('Contents.up_date',$item->slug)}}">
                <button type="submit" onclick="edit2({{$item->id}})" id="edit2_{{$item->id}}" class="d-none btn btn-sm btn-info float-right">Editar</button>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3>
                  {{$item->title}}
                  <input type="text" id="title{{$item->id}}" class="d-none form-control" name="title">
                </h3>
                <hr class="my-4">
                <p>{{$item->content}}</p>
                <textarea name="content" id="content{{$item->id}}" class="d-none form-control" ></textarea>
                </form>
              </div>
            </div>
          </div>
        </div>
    @empty
      <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="card bg-info card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3 class="text-white">
                  No hay contenido para esta unidad curricular
                </h3>
              </div>
            </div>
          </div>
        </div>
		@endforelse
      </div>
    </div>
@endsection