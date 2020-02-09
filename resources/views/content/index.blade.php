@extends('layouts.appDashboard')
@section('title','| Areas')
@section('nameTitleTemplate','Areas')
@section('js')
<script>
  function show(id){
    $('#labelArea').html($('#td_Area'+id).html());
    $('#labelAddress').html($('#td_Address'+id).html());
    $('#labelCreate').html($('#td_Create'+id).html());
    $('#labelEdit').html($('#td_Edit'+id).html());
  }
</script>
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
                <div class="col-4 text-right">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <a href="#" title data-original-title="Agregar Universidad" data-target='#createArea' data-toggle='modal' class='text-white'><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Areas</th>
                    <th scope="col">Carreras</th>
                    <th scope="col">Coordenadas</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                	
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection