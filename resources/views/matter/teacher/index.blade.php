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
  </div>
</div>
@include('layouts.modales.content.modalCreateContents')
@endsection
@endif
@section('content')
<div class="container-fluid mt--8">
      <div class="row">
        <div class="col-12 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3>
                  Unidad Curricular | {{ $matter_user->matter->matter }}
                </h3>
                <div>
                  <i class="ni education_hat mr-2"></i>
                  <h5>Versión | {{ $matter_user->matter->version }}</h5>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Carrera | {{$matter_user->matter->career->career}} 
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

        @forelse($matter_user->matter->content as $item)
        <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="card card-profile shadow">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                @if($teacher->hasRole(5))
                <a href="{{route('Contents.delete',$item->slug)}}" class="btn btn-sm btn-danger mr-4">borrar</a>
                <a href="#" id="edit1_{{$item->id}}" onclick="edit1({{$item->id}})" class="btn btn-sm btn-default float-right">Editar</a>
                @endif
                @if($item->status==false)
                <span class="float-right badge-pill badge badge-danger">Verción: {{$item->version}} - {{$item->status==true?'actualizada':'Desactualizada'}}</span>
                @else
                <span class="float-right badge-pill badge badge-success">Verción: {{$item->version}} - {{$item->status==true?'Actualizada':'Desactualizada'}}</span>
                @endif
                @if($item->confirmation==false)
                <span class="float-right badge-pill badge badge-danger">{{$item->confirmation==true?'confimada':'espera por la confirmación....'}}</span>
                @else
                <span class="float-right badge-pill badge badge-success">{{$item->confirmation==true?'confimada':'espera por la confirmación....'}}</span>
                @endif
              </div>
                <br>
                @if($teacher->hasRole(5))
              <div class="d-flex justify-content-between">
                <form method="POST" action="{{route('rollback')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="content_id" value="{{$item->id}}">
                    <div class="container">
                      <div class="row">
                        <div class="col-8">
                          <select class='form-control col' value='0' name="slug" size='1'>
                              <option class='text-center' value="0">------ Versiones ------</option>
                              @forelse($item->contentVersion as $items)

                                <option value="{{$items->slug}}">Version | {{$items->version}} - {!!$items->title!!}</option>
                              @empty
                                <option><label>------ No hay versiones para esta materia ------</label></option>
                              @endforelse                   
                          </select>
                          
                        </div>
                        <div class="col-4">
                          <button type="submit" class="btn btn-block btn-info float-right">rollback</button>
                          
                        </div>
                      </div>
                    </div>
                  

                </form>
              </div>
                @endif
              
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3 class="text-center">
                <form action="{{route('Contents.up_date',$item->slug)}}">
                <input type="hidden" id="id_matter" value="{{$matter_user->matter->id}}" >
                  <blockquote>{!!$item->title!!}</blockquote>
                  <textarea id="title{{$item->id}}" class="d-none form-control" name="title">{!!$item->title!!}</textarea>
                </h3>
                <hr class="my-4">
                <label>Introduccion:</label>
                <blockquote>{!! $item->introdution !!}</blockquote>
                <textarea name="introdution" id="introdution{{$item->id}}" class="d-none form-control" >{!! $item->introdution !!}</textarea>

                <hr class="my-4">
                <label>Contenido:</label>
                <blockquote>{!! $item->content !!}</blockquote>
                <textarea name="content" id="content{{$item->id}}" class="d-none form-control" >{!! $item->content !!}</textarea>


              </div>
            </div>

            <div class="card-footer">
              <div class="text-center">
                  <div class="row">
                    <div class="col-6">
                      <h4>Creada</h4>
                      <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>{{$item->created_at}} 
                      </div>
                    </div>
                    <div class="col-6">                        
                      <h4>Editada</h4>
                      <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>{{$item->updated_at}} 
                      </div>
                    </div>
                  </div>
                <button type="submit" onclick="edit2({{$item->id}})" id="edit2_{{$item->id}}" class="d-none btn btn-block btn-info">Editar</button>
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
@endsection