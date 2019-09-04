@extends('layouts.appDashboard')
@section('title','| Areas')
@section('nameTitleTemplate','Areas')
@section('header')
@include('layouts.header.headerDashboard')
@endsection
@section('js')
<script>
  function show(id){
    $('#labelArea').html($('#td_Area'+id).html());
    $('#labelAddress').html($('#td_Address'+id).html());
    $('#labelCreate').html($('#td_Create'+id).html());
    $('#labelEdit').html($('#td_Edit'+id).html());
  }
  function edit(id){
    $('#ModalId').val($('#id'+id).val());
    $('#ModalArea').val($('#EditAreaI'+id).val());
    $('#Modaladdress_id').val($('#EditAddress'+id).val());
    $('#ModalUniversity_id').val($('#EditUniversity'+id).val());
  }
  $('select[name="address_id"]').hover(function(){
    var select=$('select[name="address_id"] option:selected');
    var x=$('#otraAddress');
    if(select.val() == x.val()){
      $('#address').removeClass('d-none');
    }     
  });

  $('#btnEdit').click(function(){
    id=$('#ModalId');
    area=$('#ModalArea');
    address=$('#Modaladdress_id');
    university=$('#ModalUniversity_id');
    $.ajax({
      type: "PUT",
      url: APP_URL+"/Areas/"+id.val(),
      dataType: "json",
      data:{
        '_token': $('input[name=_token]').val(),
        'id':id.val(),
        'area':area.val(),
        'address_id':address.val(),
        'university_id':university.val(),
      },
      success: function (response) {
        // alret('success');
        $('#labelEditUniversity'+id.val()).html(response.university);
        $('#EditUniversity'+id.val()).val(response.university);

        $('#labelEditAddress'+id.val()).html(response.address_id);
        $('#EditAddress'+id.val()).val(response.address_id);

        $('#labelEditAddress'+id.val()).html(response.address_id);
        $('#EditAddress'+id.val()).val(response.address_id);

        $('body').removeClass('modal-open');
        $('#editArea').modal('hide');
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
              <a href="#" title data-original-title="Agregar Universidad" data-target='#createArea' data-toggle='modal' class='text-white'>
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
@include('layouts.modales.Areas.modalCreateArea')
@include('layouts.modales.Areas.modalShowArea')
@include('layouts.modales.Areas.modalEditArea')
<div class="row mt-5">
  <div class="col">
    <div class="card bg-default shadow">
      <div class="card-header bg-transparent border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="text-white mb-0">Areas</h3>
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
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
           @foreach($area as $item)
           <tr id='{{$item->id}}'>
            <td>
              <input type="hidden" id='id{{$item->id}}' value='{{$item->slug}}'>
              {{ $item->id }}
            </td>
            <td id='td_Area{{$item->id}}'>
              <label id='labelEditUniversity{{$item->id}}'>{{ $item->university->university }}</label>
              <input class='d-none' id="EditUniversity{{$item->id}}" value="{{$item->university->id}}">
            </td>
            <td id='td_Area{{$item->id}}'>
              <label id='labelEditArea{{$item->id}}'>{{ $item->area }}</label>
              <input class='d-none' id="EditAreaI{{$item->id}}" value="{{$item->area}}">
            </td>

            <td id='td_Address{{$item->id}}'>
              <label id='labelEditAddress{{$item->id}}'>{{ $item->address->addres }}</label>
              <input class='d-none' id="EditAddress{{$item->id}}" value="{{$item->address_id}}">
            </td>
            <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
            <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
            <td>
             <a class="btn-primary btn" onclick="show({{$item->id}})" data-target='#showArea' data-toggle='modal' href="#!"><i class="fa fa-eye"></i></a>

             <a class="btn-danger btn" href="{{route('Areas.delete',$item->slug)}}"><i class="fa fa-remove"></i></a>

             <a class="btn-info btn" data-target='#editArea' data-toggle='modal'  id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
           </td>
         </tr>
         @endforeach
       </tbody>
     </table>
   </div>
 </div>
</div>
</div>
@endsection