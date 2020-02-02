@extends('layouts.appDashboard')
@section('title','| Cordinadores')
@section('nameTitleTemplate','Cordinadores')
@section('js')
<script type="text/javascript">
  $('#dni').keyup(function(){
      var dni=$('#dni');
      console.log('exito'+dni.val());
      $.ajax({
        type: "GET",
        url: APP_URL+"/seacherTeacher/"+dni.val(),
        dataType: "json",
        success: function (response) {
          console.log(response);
          $('#name').text(response.name);
          $('#lastname').text(response.lastname);
          $('#email').text(response.email);
        },
      });
  });
</script>
@endsection
@section('headerContent')
@include('layouts.modales.Users.Teacher.modalAddCoordinador')
<div class="container">
  <div class="row">
    <div class="col col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Agregar un coordinador</span>
            </div>
            <div class="col-auto">
              <a href="#" title data-original-title="Agregar un coordinador" data-target='#addCoordinador' data-toggle='modal' class="text-white">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
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
              <th scope="col">Verificaciones</th>
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
              <td>{{ $item->user->dni }}</td>
              <td>{{ $item->user->name }}</td>
              <td>{{ $item->user->lastname }}</td>
              <td>{{ $item->user->email }}</td>
              <td>
                {{ $item->admin_confirmed==1?'Verificado':'No Verificado'}}
              </td>
              <td>{{ $item->user->last_login }}</td>
              <td>{{ $item->user->created_at }}</td>
              <td>{{ $item->user->updated_at }}</td>
              <td>
                <a class="btn-primary btn" href="{{route('Profile.Teacher.show',$item->slug)}}" title="Ver Usuario"><i class="fa fa-eye"></i></a>
                <a class="btn-danger btn" href="#"
                onclick="deletes('{{$item->user->slug}}','/User/Delete/')" title="Borrar Usuario"><i class="fa fa-remove"></i></a>
                @if($item->hasRole(5))
                <a href="#" onclick="remove_cargo('{{$item->slug}}','/RemoverCargo/','Remover Cargo')" title="Remover Cargo" class="btn-warning btn"><i class="fa fa-vimeo"></i></a>
                @endif
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