@extends('layouts.appDashboard')
@section('title','| Carreras')
@section('nameTitleTemplate','Carreras')
@section('js')
<script>
  function show(id){
    $('#labelArea').html($('#Area'+id).html());
    $('#labelAddress').html($('#Address'+id).html());
    $('#labelCareer').html($('#Career'+id).html());
    $('#labelModalidad').html($('#Modalidad'+id).html());
    $('#labelCreate').html($('#Create'+id).html());
    $('#labelEdit').html($('#Edit'+id).html());
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
    <div class="col-xl-4 col-lg-6 pt-4">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Reporte de las Carreras</span>
            </div>
            <div class="col-auto">
              <a href="{{route('report.career')}}" target="_blank" class='text-white'>
                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                  <i class="fa fa-download"></i>
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
@include('layouts.modales.Career.modalShowCareer')
<div class="row mt-5">
  <div class="col">
    <div class="card bg-default shadow">
      <div class="card-header bg-transparent border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="text-white mb-0">Carreras</h3>
          </div>
        </div>

      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-dark table-flush">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Universidad</th>
              <th scope="col">Areas</th>
              <th scope="col">Coordenadas</th>
              <th scope="col">Carrera</th>
              <th scope="col">Modalidad</th>
              <th scope="col">Unidades Curriculares</th>
              <th scope="col">Profesores</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          @forelse($career as $item)

          <tr id='{{$item->id}}'>
            <td>
              <input type="hidden" id='id{{$item->id}}' value='{{$item->slug}}'>
              {{ $item->id }}
            </td>
            <td id="University{{$item->id}}">
              <label >{{ $item->area->university->university }}</label>
              <input class='d-none' id="EditUniversity{{$item->id}}" value="{{$item->area->university->id}}">
            </td>
            <td id="Area{{$item->id}}">
              <label >{{ $item->area->area }}</label>
              <input type="hidden" id='EditAreaI{{$item->id}}' value="{{$item->id}}">
            </td>

            <td id="Address{{$item->id}}">
              <label >{{ $item->area->address->addres }}</label>
              <input class='d-none' id="EditAddress{{$item->id}}" value="{{$item->address_id}}">
            </td>
            <td id="Career{{$item->id}}">
              <label >{{ $item->career }}</label>
              <input type="hidden" id="EditCareer{{$item->id}}" value="{{ $item->career }}">
            </td>
            <td id="Modalidad{{$item->id}}">
              <label >{{ $item->modalidad }}</label>
              <input type="hidden" id='EditModalidad{{$item->id}}' value="{{$item->modalidad}}">
            </td>
            <td>
              <a href="{{ route('MattersCareer.show',$item->slug) }}" class="btn btn-sm btn-info">{{ $item->matter->count() }}</a>
              <input type="hidden" id='EditAddress{{$item->id}}' value="{{$item->area->address->addres}}">
            </td>
            <td>
              <a href="{{ route('MatterUserCareer.show',$item->slug) }}"  class=" btn btn-info btn-sm">ver</a>
              <input class='d-none' id="EditAddress{{$item->id}}" value="{{$item->address_id}}">
            </td>  
            <td id='Create{{$item->id}}'><label >{{ $item->created_at }}</label></td>
            <td id='Edit{{$item->id}}'><label >{{ $item->updated_at }}</label></td>
            <td>
              <a class="btn-primary btn" title='Ver' onclick="show({{$item->id}})" data-target='#showCareer' data-toggle='modal' href="#!"><i class="fa fa-eye"></i></a>

              <a class="btn-danger btn" title="Borrar " href="#" onclick="deletes('{{$item->slug}}','/Career/Delete/')"><i class="fa fa-remove"></i></a>

              <a class="btn-info btn" title="Editar" id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" data-target='#editCareer' data-toggle='modal'  id="btn-1_{{$item->id}}" href="#!"><i class="fa fa-edit"></i></a>

           </td>
          </tr>
        @empty
        <tr>
          <td>
            <div class="alert alert-success col-xl-9 order-xl-2 mb-5 mb-xl-0 pt-4">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    No hay Carreras 
            </div>
              
          </td>

        </tr>


        @endforelse
          </tbody>
        </table>
      </div>
      <div class="card-footer bg-default py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item ">
              {{ $career->links() }}
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

@endsection