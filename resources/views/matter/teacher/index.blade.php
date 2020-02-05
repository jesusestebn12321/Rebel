@section('title','| Unidad Curricular '. $matter_user->matter->matter)
@section('nameTitleTemplate','Unidad Curricular '. $matter_user->matter->matter)
@section('js')
<script type="text/javascript">
  function edit1(arg){
      $('#edit2_'+arg).toggleClass('d-none');
      $('#edit1_'+arg).toggleClass('d-none');
      $('#title'+arg).toggleClass('d-none');
      $('#content'+arg).toggleClass('d-none');
      $('#introdution'+arg).toggleClass('d-none');
      
      $('#content'+arg).wysihtml5({
        toolbar: { fa: true }
      });
      
      $('#title'+arg).wysihtml5({
        toolbar: { fa: true }
      });
      
      $('#introdution'+arg).wysihtml5({
          toolbar: { fa: true }
      });



  }
  function edit2(arg){
      $('#edit2_'+arg).toggleClass('d-none');
      $('#edit1_'+arg).toggleClass('d-none');
      $('#title'+arg).toggleClass('d-none');
      $('#content'+arg).toggleClass('d-none');
      $('#introdution'+arg).toggleClass('d-none');
  }
  $(document).ready(function(){
    var id=$('#id_matter');
    $('#matter_id').val(id.val());
  });
  $('#content').wysihtml5({
    toolbar: { fa: true }
  });
  $('#introdution').wysihtml5({
    toolbar: { fa: true }
  });
      

</script>
@endsection
@if($teacher->hasRole(5))
@section('headerContent')
<div class="container">
  <div class="row">
    <div class="col-xl-4 col-lg-6 pt-4 mb-4">
      <div class="card card-stats mb-9 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-5">Crear un contenido</span>
            </div>
            <div class="col-auto">
              <a href="{{route('Contents.create',$matter_user->matter->slug)}}" title data-original-title="Agregar contenido" class='text-white'>
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
              <span class="h2 font-weight-bold mb-0">Reporte de la Unidad Curricular</span>
            </div>
            <div class="col-auto">
              <a target="_blank" href="{{route('reportTeacher.matter',Auth::user()->slug)}}" class='text-white'>
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
@include('layouts.modales.content.modalCreateContents')
@endsection
@endif
@section('content')
<div class="container-fluid mt--8">
      <div class="row">
        <div class="col-12 order-xl-2 mb-5 mb-xl-0 mt-4">
          <div class="card card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3>
                  Unidad Curricular | {{ $matter_user->matter->matter }}
                  <input value='{{$matter_user->matter->id}}' type="hidden" id="id_matter" name="">
                </h3>
                <div>
                  <i class="ni education_hat mr-2"></i>
                  <h5>Credito | {{ $matter_user->matter->credit }}</h5>
                  <i class="ni education_hat mr-2"></i>
                  <h5>Semestre | {{ $matter_user->matter->semester }}</h5>
                </div>
                <div>
              <i class="ni education_hat mr-2"></i>
              <h5>Horas</h5><hr>
              <div class="row">
                <div class="col">
                  <h5>HT <hr> {{$matter_user->ht}}</h5>
                </div>
                <div class="col">
                  <h5>HL <hr> {{$matter_user->hl}}</h5>
                </div>
                <div class="col">
                  <h5>HP <hr> {{$matter_user->hp}}</h5>
                </div>
              </div><hr>
            </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Carrera | {{$matter_user->matter->career? $matter_user->matter->career->career : ''}} 
                </div>
                <div class="card-footer">
                 <div class="text-center">
                    <div class="row">
                      <div class="col-6">
                        <h4>Creada</h4>
                        <div class="h5 mt-4">
                          <i class="ni business_briefcase-24 mr-2"></i>{{$matter_user->matter->created_at}} 
                        </div>
                      </div>
                      <div class="col-6">                        
                        <h4>Editada</h4>
                        <div class="h5 mt-4">
                          <i class="ni business_briefcase-24 mr-2"></i>{{$matter_user->matter->updated_at}} 
                        </div>
                      </div>
                    </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="text-white mb-0">Contenidos</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Version</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Confirmacón</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Editado</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @forelse($matter_user->matter->content as $item)
                  <tbody><tr></tr>
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{!!$item->slug!!}</td>
                      <td>{!!$item->version!!}</td>
                      <td>
                        @if($item->status==false)Desactualizada
                        @else
                        Actualizada
                        @endif
                      </td>
                      <td>
                        @if($item->confirmation==false)
                         {{$item->confirmation==true?'confimada':'espera por la confirmación....'}}
                        @else
                        {{$item->confirmation==true?'confimada':'espera por la confirmación....'}}
                        @endif
                      </td>
                      <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
                      <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
                      <td>
                        @if($teacher->hasRole(5))
                        <a href="{{route('Contents.delete',$item->slug)}}" class="btn btn-sm btn-danger">Borrar</a>

                        <a href="{{route('Contents.edit',$item->slug)}}" id="edit1_{{$item->id}}" class="btn btn-sm btn-info">Editar</a>

                        @if($item->status==false)
                          <a href="{{route('Contents.update_status', $item->slug)}}" class="btn btn-sm btn-success">Actualizar</a>
                        @endif
                        @endif   
                        <a href="{{route('Contents.show', $item->slug)}}" class="btn btn-sm btn-warning">Ver</a>
                      </td>
                    </tr>
                  </tbody>
                @empty
                
                @endforelse
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection