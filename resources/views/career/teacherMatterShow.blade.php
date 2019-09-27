@extends('layouts.appDashboard')
@section('title','| Profesores de  '.$career->career)
@section('nameTitleTemplate','Profesores de '.$career->career)
@section('js')
<script>
  $('#dniTeacher').keyup(function(){
    var dni= $('#dniTeacher');
    $.ajax({
      type: "GET",
      url: APP_URL+"/MattersUsers/search/"+dni.val(),
      dataType: "json",
      success: function (response) {
        $('#teacherContent').html('<div class="card">'+
          '<div class="card-body">'+
            '<div class="row">'+
              '<div class="col-12"><label>Nombre: '+response.name+'</label></div>'+
              '<div class="col-12"><label>Apellido: '+response.lastname+'</label></div>'+
              '<div class="col-12"><label>E-mail: '+response.email+'</label></div>'+
            '</div>'+
          '</div>'+
        '</div>');

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
              <span class="h2 font-weight-bold mb-0">Añadir Profesor</span>
            </div>
            <div class="col-auto">
              <a href="#" title data-original-title="Agregar Carreras" data-target='#addMatterTeacher' data-toggle='modal' class='text-white'>
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
@include('layouts.modales.MatterTeacher.matterTeacher')
@endsection
@section('content')
<div class="row">
  {{-- {{ $matter }} --}}
  @foreach($matter_user as $items)
  @if($items->matter->career_id==$career->id)
   <div class="col-xl-4 order-xl-2 mb-8 mb-xl-6">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-6 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('template/assets/img/theme/user.jpg') }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div><br><br><br>
            <div class="card-body pt-0 pt-md-5">
              <div class="row">
                <div class="col-6">
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
                  <i class="ni location_pin mr-2"></i>{{$items->type!=0?'Profesor':'Coordinador'}}
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
</div>

@endsection

