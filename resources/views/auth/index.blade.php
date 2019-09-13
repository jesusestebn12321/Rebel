@extends('layouts.appDashboard')
@section('title','| Usuarios')
@section('nameTitleTemplate','Usuarios')
@section('js')
<script>
  var btnUserTeacher=$('#userTeacher');
  var userTeacherTable=$('#userTeacherTable');
  var btnUserEstudents=$('#userEstudents');
  var userEstudentsTable=$('#userEstudentsTable');
  
  btnUserTeacher.click(function(){
    userTeacherTable.removeClass('d-none');
    userEstudentsTable.addClass('d-none');
  });
  var btnUserEstudents.click(function(){
    userTeacherTable.addClass('d-none');
    userEstudentsTable.removeClass('d-none');
  });
</script>
@endsection
@section('content')
 <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Card tables</h3>
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
                    <th scope="col">Rol</th>
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->rol}}</td>
                    <td>{{ $item->verifi}}</td>
                    <td>{{ $item->last_login}}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                    	<a class="btn-primary btn"><i class="fa fa-eye"></i></a>
                    	<a class="btn-danger btn"><i class="fa fa-remove"></i></a>
                    	<a class="btn-info btn"><i class="fa fa-edit"></i></a>
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