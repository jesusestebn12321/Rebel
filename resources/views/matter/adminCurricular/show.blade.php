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
        @forelse($matter->content as $item)
        <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="card card-profile shadow">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
               
                @if($item->confirmation==true)
                  <a href="{{route('remove.content',$item->slug)}}" class="btn btn-sm btn-warning float-right" title="Remover verificación"><i class="fa fa-remove"></i></a>
                @elseif($item->confirmation==false)
                  <a href="{{route('verify.content',$item->slug)}}" class="btn btn-sm btn-success float-right" title="Verificar"><i class="fa fa-check"></i></a>
                @endif
                
                <a href="#" class="btn btn-sm btn-default float-right" title="Ver Versione Antiguas"><i class="fa fa-eye"></i></a>

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
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3 class="text-center">
                  <blockquote>{!!$item->title!!}</blockquote>
                </h3>
                <hr class="my-4">
                <blockquote>{!! $item->content !!}</blockquote>
                <hr class="my-4">
                <blockquote>{!! $item->introdution !!}</blockquote>
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