@extends('layouts.appDashboard')
@section('title','| Estudiantes')
@section('nameTitleTemplate','Estudiantes')
@section('js')
  <script type="text/javascript">
    function edit(id){
      $('#ModalId').val($('#tdId'+id).text());
      $('#ModalDni').val($('#tdDni'+id).text());
      $('#ModalLastname').val($('#tdLastname'+id).text());
      $('#ModalName').val($('#tdName'+id).text());

    }
  </script>
@endsection
@section('content')
@include('layouts.modales.Users.Student.modalEditStudent')
 <div class="row mt-5">
  <div class="col">
    <div class="card bg-default shadow">
      <div class="card-header bg-transparent border-0">
        <h3 class="text-white mb-0">Estudiantes</h3>
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
            @forelse($user as $item)
            <tr>
              <td id="tdId{{$item->id}}">{{ $item->id }}</td>
              <td id="tdDni{{$item->id}}">{{ $item->dni }}</td>
              <td id="tdName{{$item->id}}">{{ $item->name }}</td>
              <td id="tdLastname{{$item->id}}">{{ $item->lastname }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->confirmed==1?'Verificado':'Aun no se a Verificado'}}</td>
              <td>{{ $item->last_login}}</td>
              <td>{{ $item->created_at }}</td>
              <td>{{ $item->updated_at }}</td>
              <td>
                <a class="btn-primary btn" title="Ver" href="{{route('Profile.show',$item->slug)}}"><i class="fa fa-eye"></i></a>
              	<a class="btn-danger btn" title="Borrar" href="{{route('User.delete',$item->slug)}}"><i class="fa fa-remove"></i></a>
              	<a class="btn-info btn" title="Editar" onclick="edit({{$item->id}})" href="#" data-target='#editStudent' data-toggle='modal'><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            @empty
            <tr>
              <td>
                <font class='center'>No existen registros</font>
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