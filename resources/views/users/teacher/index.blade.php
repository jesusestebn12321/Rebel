@extends('layouts.appDashboard')
@section('title','| Teacher')
@section('nameTitleTemplate','Profesores')
@section('js')
<script>
  var teacherAll=$('#teacherAll');
  var teacherVerify=$('#teacherVerify');
  var teacherNotVerify=$('#teacherNotVerify');
  var teacherAllTable=$('#teacherAllTable');
  var teacherVerifyTable=$('#teacherVerifyTable');
  var teacherNotVerifyTable=$('#teacherNotVerifyTable');
  
  teacherAll.click(function(){
    teacherAllTable.removeClass('d-none');
    teacherVerifyTable.addClass('d-none');
    teacherNotVerifyTable.addClass('d-none');
  });
  teacherVerify.click(function(){
    teacherAllTable.addClass('d-none');
    teacherVerifyTable.removeClass('d-none');
    teacherNotVerifyTable.addClass('d-none');
  });
  teacherNotVerify.click(function(){
    teacherAllTable.addClass('d-none');
    teacherVerifyTable.addClass('d-none');
    teacherNotVerifyTable.removeClass('d-none');
  });
</script>
@endsection
@section('headerContent')
@include('layouts.modales.Users.Teacher.modalEditTeacher')
<div class="container">
  <div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Todos</span>
            </div>
            <div class="col-auto">
              <a href="#" id='teacherAll' class="text-white">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <i class="fa fa-users"></i>
                </div>
              </a> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Verificados</span>
            </div>
            <div class="col-auto">
              <a href="#" id='teacherVerify' class="text-white">
                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                  <i class="fa fa-unlock"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">No Verificados</span>
            </div>
            <div class="col-auto">
              <a href="#" id='teacherNotVerify' class="text-white">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                  <i class="fa fa-lock"></i>
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
              <span class="h2 font-weight-bold mb-0">Reporte de las Profesores</span>
            </div>
            <div class="col-auto">
              <a href="{{route('report.teacher')}}" class='text-white'>
                <div class="icon icon-shape bg-default text-white rounded-circle shadow">
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
          @include('users.teacher.tables.tbodyAll')
          @include('users.teacher.tables.tbodyVerify')
          @include('users.teacher.tables.tbodyNotVerify')
     </table>
   </div>
 </div>
</div>
</div>
@endsection