@extends('layouts.appDashboard')
@section('title','| Agregar Cordinadores')
@section('nameTitleTemplate','Agregar Cordinadores')
@section('js')
<script type="text/javascript">
  var career=$('#career');
  var html='';
  career.click(function(){
    if(career.val()!=0){
      $.ajax({
        type: "GET",
        url: APP_URL+"/MatterAjax/"+career.val(),
        dataType: "json"
        ,success: function (response) {
          $('#div_matter').removeClass('d-none');
          html='<option value="0">Und. Curriculares</option>';
          for (var i = 0; response.length>i ; i++){ 
            html+='<option value="'+response[i].id+'">'+response[i].id+' - '+response[i].matter+'</option>';
          }
          $('#matter').html(html);
        }
      });
    }
  });
  $('#matter').click(function(){
    if($('#matter').val()!=0){
      $('#button').removeClass('d-none');
    }
  });
  function addCoordinador(dni){
    $('#dni').val(dni);
  }
</script>
@endsection
@section('content')
@include('layouts.modales.Users.Teacher.modalAddCoordinador')
<div class="row mt-5">
  <div class="col">
    <div class="card bg-default shadow">
      <div class="card-header bg-transparent border-0">
        <h3 class="text-white mb-0">Profesores</h3>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-dark table-flush">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Cedula</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">E-mail</th>
              <th scope="col">Last_Login</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($teacher as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->dni }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->lastname }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->last_login }}</td>
              <td>{{ $item->created_at }}</td>
              <td>{{ $item->updated_at }}</td>
              <td>
                <a href="#" data-target='#addCoordinador' onclick='addCoordinador("{{$item->dni}}")' data-toggle='modal' title="Agregar Coordinador" class="btn-success btn-sm btn">Agregar Coordinador</a>
              </td>
            </tr>
            @empty
            <tr>
              <td>
                <font>No hay profesores</font>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection