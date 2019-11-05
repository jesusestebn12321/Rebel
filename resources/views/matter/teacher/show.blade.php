@extends('layouts.appDashboard')
@section('title','| Unidad Curricular '. $matter->matter)
@section('nameTitleTemplate','Unidad Curricular '. $matter->matter)
@section('js')
<script type="text/javascript">
  function edit1(arg){
      $('#edit2_'+arg).toggleClass('d-none');
      $('#edit1_'+arg).toggleClass('d-none');
      $('#title'+arg).toggleClass('d-none');
      $('#content'+arg).toggleClass('d-none');
      $('#content'+arg).wysihtml5({
        toolbar: { fa: true }
      });
      $('#title'+arg).wysihtml5({
        toolbar: { fa: true }
      });

  }
  function edit2(arg){
      $('#edit2_'+arg).toggleClass('d-none');
      $('#edit1_'+arg).toggleClass('d-none');
      $('#title'+arg).toggleClass('d-none');
      $('#content'+arg).toggleClass('d-none');
      $('#content'+arg).wysihtml5({
        toolbar: { fa: true }
      });
      $('#title'+arg).wysihtml5({
        toolbar: { fa: true }
      });
  }
  $(document).ready(function(){
    var id=$('#id_matter');
    $('#matter_id').val(id.val());
  });

</script>
@endsection
@if($matter_user->type==0)
@section('headerContent')
<div class="container">
  <div class="row">
    <div class="col-xl-4 col-lg-6 pt-4">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Crear un contenido</span>
            </div>
            <div class="col-auto">
              <a href="#" title data-original-title="Agregar contenido" data-target='#createContent' data-toggle='modal' class='text-white'>
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
@include('layouts.modales.content.modalCreateContents')
@include('layouts.modales.MatterTeacher.teacherMatter')

@endsection
@endif
@section('content')
<div class="container-fluid mt--8">
      <div class="row">
        <div class="col-12 order-xl-1 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-header">
              <div class="text-center">
                <h3>
                  Unidad Curricular | {{ $matter->matter }}
                </h3>
                <div>
                  <i class="ni education_hat mr-2"></i>
                  <h5>Versión | {{ $matter->version }}</h5>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Carrera | {{$matter->career->career}} 
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <div class="container-fluid">
                  <div class="row">

                  	@forelse($content as $items)
                    <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
                      <div class="card card-profile shadow">
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                          <div class="d-flex justify-content-between">
                            @if($matter_user->type==0)
                            <a href="{{route('Contents.delete',$items->slug)}}" class="btn btn-sm btn-danger mr-4">Borrar</a>
                            @endif
                            <a href="#" id="edit1_{{$items->id}}" onclick="edit1({{$items->id}})" class="btn btn-sm btn-default float-right">Editar</a>
                            
                            <form action="{{route('Contents.up_date',$items->slug)}}">
                            
                            <button type="submit" onclick="edit2({{$items->id}})" id="edit2_{{$items->id}}" class="d-none btn btn-sm btn-info float-right">Editar</button>
                            <input type="hidden" id="id_matter" value="{{$matter->id}}" >
                          </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                          
                          <div class="text-center">
                            <h3>
                              <blockquote>{!!$items->title!!}</blockquote>
                              <textarea id="title{{$items->id}}" class="d-none form-control" name="title">{!!$items->title!!}</textarea>
                            </h3>
                            <hr class="my-4">
                            <blockquote>{!! $items->content !!}</blockquote>
                            <textarea name="content" id="content{{$items->id}}" class="d-none form-control" >{!! $items->content !!}</textarea>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    @empty
                    <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
                      <div class="card bg-info card-profile shadow">
                        <div class="card-body pt-0 pt-md-4">
                          <div class="text-center">
                            <h3 class="text-white">
                              No hay contenido para esta unidad curricular
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>
            		    @endforelse
                  </div>
                </div>


                <div class="card-footer">
                 <div class="text-center">
                    <div class="row">
                      <div class="col-6">
                        <h4>Creada</h4>
                        <div class="h5 mt-4">
                          <i class="ni business_briefcase-24 mr-2"></i>{{$matter->created_at}} 
                        </div>
                      </div>
                      <div class="col-6">                        
                        <h4>Editada</h4>
                        <div class="h5 mt-4">
                          <i class="ni business_briefcase-24 mr-2"></i>{{$matter->updated_at}} 
                        </div>
                      </div>
                    </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-header">
              <div class="text-center">
                <h2>Profesores</h2>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">

              <div class="conteiner-fluid">
                <div class="row">
                  
                
                @forelse($teachers as $item)
                  <div class="col-xl-4 mt-5 mb-xl-6">
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
                            {{ $item->user->name }} {{ $item->user->lastname }}
                          </h3>
                          <h4>
                            CI: {{ $item->user->dni }}
                          </h4>
                          <div>
                            <i class="ni education_hat mr-2"></i>Unidad Curricular
                          </div>
                          <div>
                            {{ $item->matter->matter }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
                      <div class="card bg-info card-profile shadow">
                        <div class="card-body pt-0 pt-md-4">
                          <div class="text-center">
                            <h3 class="text-white">
                              No hay Profesores Asignados para esta Unidad Curricular.
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforelse
        </div>

                </div>
              </div>
              </div>
            </div>
          </div>
        </div>              

      </div>
    </div>
@endsection