@extends('layouts.appDashboard')
@section('title','| Carreras')
@section('nameTitleTemplate','Carreras')
@section('js')
<script>
  function show(id){
    $('#labelArea').html($('#td_Area'+id).html());
    $('#labelAddress').html($('#td_Address'+id).html());
    $('#labelCareer').html($('#td_Career'+id).html());
    $('#labelModalidad').html($('#td_Modalidad'+id).html());
    $('#labelCreate').html($('#td_Create'+id).html());
    $('#labelEdit').html($('#td_Edit'+id).html());
  }
  function edit(id){
    $('#ModalId').val($('#id'+id).val());
    $('#ModalArea').val($('#EditAreaI'+id).val());
    $('#ModalCareer').val($('#EditCareer'+id).val());
    $('#ModalModalidad').val($('#EditModalidad'+id).val());
  }

  $('#btnEdit').click(function(){
    id=$('#ModalId');
    area=$('#ModalArea');
    career=$('#ModalCareer');
    modalidad=$('#ModalModalidad');
    $.ajax({
      type: "PUT",
      url: APP_URL+"/Careers/"+id.val(),
      dataType: "json",
      data:{
        '_token': $('input[name=_token]').val(),
        'id':id.val(),
        'career':career.val(),
        'modalidad':modalidad.val(),
        'area_id':area.val(),
      },
      success: function (response) {

        $('#labelEditCareer'+id.val()).html(response.career);
        $('#EditCareer'+id.val()).val(response.career);

        $('#labelEditModalidad'+id.val()).html(response.modalidad);
        $('#EditModalidad'+id.val()).val(response.modalidad);


        $('body').removeClass('modal-open');
        $('#editCareer').modal('hide');
        $('.modal-backdrop').remove();

        $('body > div > div.header.pb-8.pt-5.pt-lg-8.d-flex.align-items-center > div > div > div > div > div > div').append('<div class="col mb-6 pt-5 mb-xl-0 alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p>Exito</p></div>');
      }
    });
  });
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
              <span class="h2 font-weight-bold mb-0">Crear Carrera</span>
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
@include('layouts.modales.Career.modalCreateCareer')
@include('layouts.modales.Career.modalEditCareer')
<div class="row">
  @forelse($career as $item)
  <input type="hidden" value="{{$item->slug}}" id="id{{$item->id}}">
  <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0 pt-4">
    <div class="card card-profile shadow">
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
          <a href="#" onclick="edit({{$item->id}})" data-target='#editCareer' data-toggle='modal'  id="btn-1_{{$item->id}}" class="btn btn-sm btn-info text-lg mr-4">Editar</a>
          <a href="{{route('Careers.delete',$item->slug)}}" class="btn btn-sm btn-danger float-right text-lg">Borrar</a>
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="row">

          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center ml-3 mt-md-5">
              <div>
                <div class="d-flex justify-content-between">
                  <a href="{{ route('MattersCareer.show',$item->slug) }}" class="btn btn-sm btn-warning mr-0 text-lg">{{$item->matter->count()}} Und. Curriculares </a>
                </div>
              </div>
              <div>
                <div class="d-flex justify-content-between">
                  <a href="{{ route('MatterUserCareer.show',$item->slug) }}" class="btn btn-sm btn-success mr-0 text-lg">Profesores</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <h3><span class="fa fa-tv"></span> 
            Carrera - <span>{{ $item->career }}</span> 
            <input type="hidden" id="EditCareer{{$item->id}}" value="{{ $item->career }}">
          </h3>
          <div class="text-center">
            <div class="h5 mt-4">
              <i class="ni ni-building mr-2"></i>Area - <span id="labelEditArea{{$item->id}}">{{ $item->area->area }}</span>
              <input type="hidden" id='EditAreaI{{$item->id}}' value="{{$item->id}}">
            </div>
            <div class="h5 mt-4">
              <i class="ni ni-map-big mr-2"></i>Localización - <span id="labelEditModalidad{{$item->id}}">{{ $item->area->address->addres }}</span>
              <input type="hidden" id='EditAddress{{$item->id}}' value="{{$item->area->address->addres}}">
            </div>
            <div class="h5 mt-4">
              <i class="ni ni-ruler-pencil mr-2"></i>Modalidad - <span>{{ $item->modalidad }}</span> 
              <input type="hidden" id='EditModalidad{{$item->id}}' value="{{$item->modalidad}}">
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

    <div class="alert alert-success col-xl-9 order-xl-2 mb-5 mb-xl-0 pt-4">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            no hy swss
    </div>



  @endforelse
</div>

@endsection