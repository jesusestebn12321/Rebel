@extends('layouts.appDashboard')
@section('title','| Carreras '.$career->career)
@section('nameTitleTemplate','Carrera '.$career->career.' | Unid. Curriculares')
@section('js')
<script>
    function contentNumber(){
      var xContetn=$('#numberContent').val();
      
      for (var i = 0; xContetn >   i ; i++) {
        
        $('#contentMatters').append('<hr><div class="form-group">'+
                        '<input type="text" placeholder="Title '+i+'" class="form-control" name="title_'+i+'" autofocus required ></div>'+
                        '<div class="form-group">'+ 
                        '<textarea placeholder="Contenido '+i+'" class="form-control" name="content_'+i+'" autofocus required ></textarea>');
      }
    }
    function loadContent(arg){
      $('#matter_id').val(arg);
    }
    function edit(arg){
      var countContent=$('#countContent');
      var input_matter=$('#input_matter'+arg);
      var input_version=$('#input_version'+arg);
      var input_slug=$('#input_slug'+arg);
      var label_matter=$('#label_matter'+arg);
      var label_version=$('#label_version'+arg);
      var label_slug=$('#label_slug'+arg);
      var divLabels=$('#divLabels'+arg);
      var divInput=$('#divInput'+arg);
      var btn_edit=$('#btn_edit'+arg);
      var btn_cancelar=$('#btn_cancelar'+arg);
      var btn_success=$('#btn_success'+arg);
      
      rDnone(input_matter);
      rDnone(input_version);
      rDnone(input_slug);
      rDnone(divInput);
      rDnone(btn_cancelar);
      rDnone(btn_success);
      
      aDnone(label_matter);
      aDnone(label_slug);
      aDnone(label_version);
      aDnone(divLabels);
      aDnone(btn_edit);


    }
    function cancelar(arg){
      var countContent=$('#countContent');
      var input_matter=$('#input_matter'+arg);
      var input_version=$('#input_version'+arg);
      var input_slug=$('#input_slug'+arg);
      var label_matter=$('#label_matter'+arg);
      var label_version=$('#label_version'+arg);
      var label_slug=$('#label_slug'+arg);
      var divLabels=$('#divLabels'+arg);
      var divInput=$('#divInput'+arg);
      var btn_cancelar=$('#btn_cancelar'+arg);
      var btn_edit=$('#btn_edit'+arg);
      var btn_success=$('#btn_success'+arg);

      aDnone(input_matter);
      aDnone(input_version);
      aDnone(input_slug);
      aDnone(divInput);
      aDnone(btn_cancelar);
      aDnone(btn_success);
    
      rDnone(label_matter);
      rDnone(label_slug);
      rDnone(label_version);
      rDnone(divLabels);
      rDnone(btn_edit);


    }
    function rDnone(arg){
      arg.removeClass('d-none');
      return  true;
    }
    function aDnone(arg){
      arg.addClass('d-none');
      return  true;
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
              <span class="h2 font-weight-bold mb-0">Añadir Unidad curricular</span>
            </div>
            <div class="col-auto">
              <a href="#" title data-original-title="Agregar Unidad Curricular" data-target='#addMatter' data-toggle='modal' class='text-white'>
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

@include('layouts.modales.Matter.modalAddMatters')
@endsection
@section('content')
<div class="row">
  {{-- {{ $matter }} --}}
  @forelse($matter as $item)
  <form action="{{ route('Matters.up_date',$item->slug) }}" class="form-horizontal col-6" method="GET">    
    <input type="hidden" name="countContent" value="{{$item->content->count()}}" id="countContent">
    <input type="hidden" name="career_id" value="{{$career->id}}" id="career_id">
    <div class="col-12 order-xl-2 mb-5 mb-xl-0 pt-4">
      <div class="card card-profile shadow">
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            <a href="#!" onclick="edit({{$item->id}})"  id="btn_edit{{$item->id}}" class="btn btn-sm btn-info text-lg mr-4">Editar</a>
            <a href="#!" onclick="cancelar({{$item->id}})" id="btn_cancelar{{$item->id}}" class="d-none btn btn-sm btn-warning text-lg mr-4">Cancelar</a>
            <a href="{{route('Matters.delete',$item->slug)}}" class="btn btn-sm btn-danger float-right text-lg">Borrar</a>
          </div>
          <h1><i class="fa fa-tv"></i> <span id="label_matter{{$item->id}}"> {{ $item->matter }}</span> 
          <div class="form-group col-9 center">
            <input type="text" value="{{$item->matter}}" class="form-control d-none" id="input_matter{{$item->id}}" name="matter">
          </div>
          </h1>
          <h2><i class="fa fa-tv"></i> Vercion: 
            <span id="label_version{{$item->id}}"> {{ $item->version }}</span> 
          </h2>
          <div class="form-group col-9 center">
            <input type="text" value="{{$item->version}}" class="form-control d-none" id="input_version{{$item->id}}" name="version">
          </div>
          <h3><i class="fa fa-key"></i> Codigo: 
            <span id="label_slug{{$item->id}}"> {{ $item->slug }}</span> 
          </h3>
          <div class="form-group col-9 center">
            <input type="text" value="{{$item->slug}}" class="form-control d-none" id="input_slug{{$item->id}}" name="slug">
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center ml-3 mt-md-5">
                <div>
                  @if(isset($item->content))
                  <div class="d-flex justify-content-between">
                    <a href="{{route('Contents.show',$item->content[0]->slug)}}" class='btn btn-warning'>Ver Contenidos </a>  
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
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
        <div class="card-footer">
          <button class="btn-success btn-block btn d-none" id="btn_success{{$item->id}}">Editar</button>
        </div>
      </div>
    </div>
  </form>
  @empty
    <div class="alert alert-success col text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      No hay Und. Curriculares para esta carrera
  </div>
  @endforelse
</div>

@endsection