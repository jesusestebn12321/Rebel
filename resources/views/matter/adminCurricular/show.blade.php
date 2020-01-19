@extends('layouts.appDashboard')
@section('title','| Unidad Curricular '. $matter->matter)
@section('nameTitleTemplate','Carrera '. $matter->career->career .' | Unidad Curricular '. $matter->matter)
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
      $('#introdution'+arg).wysihtml5({
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
@section('content')
<div class="container-fluid mt--8">
      <div class="row">
        @if($content)
        <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="card card-profile shadow">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
               
                @if(Auth::user()->hasRole(4))
                @if($content->confirmation==true)
                  <a href="{{route('remove.content',$content->slug)}}" class="btn btn-sm btn-danger float-right" title="Remover verificación"><i class="fa fa-remove"></i></a>
                @elseif($content->confirmation==false)
                  <a href="{{route('verify.content',$content->slug)}}" class="btn btn-sm btn-success float-right" title="Verificar"><i class="fa fa-check"></i></a>
                @endif
                <a href="#" class="btn btn-sm btn-default float-right" title="Ver Versione Antiguas"><i class="fa fa-eye"></i></a>

                @endif
                @if($content->status==false)
                <span class="float-right badge-pill badge badge-danger">Verción: {{$content->version}} - {{$content->status==true?'actualizada':'Desactualizada'}}</span>
                @else
                <span class="float-right badge-pill badge badge-success">Verción: {{$content->version}} - {{$content->status==true?'Actualizada':'Desactualizada'}}</span>
                @endif
                @if($content->confirmation==false)
                <span class="float-right badge-pill badge badge-danger">{{$content->confirmation==true?'confimada':'espera por la confirmación....'}}</span>
                @else
                <span class="float-right badge-pill badge badge-success">{{$content->confirmation==true?'confimada':'espera por la confirmación....'}}</span>
               
               </div>
               <br>
               
                @endif
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3 class="text-center">
                  <blockquote>{!!$content->title!!}</blockquote>
                </h3>
                <hr class="my-4">
                <blockquote>{!! $content->content !!}</blockquote>
                <hr class="my-4">
                <blockquote>{!! $content->introdution !!}</blockquote>
              </div>
            </div>

            <div class="card-footer">
              <div class="text-center">
                  <div class="row">
                    <div class="col-6">
                      <h4>Creada</h4>
                      <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>{{$content->created_at}} 
                      </div>
                    </div>
                    <div class="col-6">                        
                      <h4>Editada</h4>
                      <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>{{$content->updated_at}} 
                      </div>
                    </div>
                  </div>
              </div>
            </div>




          </div>
        </div>
    @else
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
    @endif
      </div>
    </div>
@endsection