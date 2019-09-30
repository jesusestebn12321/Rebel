@extends('layouts.appDashboard')
@section('title','| Estudiantes')
@section('nameTitleTemplate','Estudiantes')
@section('js')

@endsection
@section('content')
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->confirmed==1?'Verificado':'Aun no se a Verificado'}}</td>
                    <td>{{ $item->last_login}}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                    	<a class="btn-primary btn" href="{{route('Profile.show',$item->slug)}}"><i class="fa fa-eye"></i></a>
                    	<a class="btn-danger btn" href="{{route('User.delete',$item->slug)}}"><i class="fa fa-remove"></i></a>
                    	<a class="btn-info btn" href="#"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  @empty
                    <td>
                      <font class='center'>No existen registros</font>
                    </td>
                @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection