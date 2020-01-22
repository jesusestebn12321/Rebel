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

                @if($teacher->hasRole(5) && Auth::user()->hasRole(2))
                <a href="{{route('Contents.delete',$content->slug)}}" class="btn btn-sm btn-danger mr-4">Borrar</a>
                @endif

                <form action="{{route('Contents.up_date',$content->slug)}}">
                <button type="submit" onclick="edit2({{$content->id}})" id="edit2_{{$content->id}}" class="d-none btn btn-sm btn-info float-right">Editar</button>
                <input type="hidden" id="id_matter" value="{{$matter->id}}" >
              </div>
            </div>
            <div class="card-header">
              <div class="container">
                <div class='row'>

                  <div class="col">
                    <label>Semestre</label>
                    <p>{!!  $content->matters->semester !!}</p>
                  </div>
                  <div class="col">
                    <label>Codigo</label>
                      <p>{!! $content->slug !!}</p>
                  </div> 
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3>
                  {!!$content->title!!}
                  <input type="text" id="title{{$content->id}}" class="d-none form-control" name="title">
                </h3>
                <label>Justificación</label>
                <p>{!!  $content->justification!!}</p>
                <textarea name="justification" id="justification{{$content->id}}" class="d-none form-control" ></textarea><p>
                
                <hr><label>Propocito</label>
                <p>{!!  $content->purpose!!}</p>
                <textarea name="purpose" id="purpose{{$content->id}}" class="d-none form-control" ></textarea><p>
                
                <hr><label>Contenido</label><p>
                {!!  $content->content!!}</p>
                <textarea name="content" id="content{{$content->id}}" class="d-none form-control" ></textarea>

                <hr><label>Estrategia Metodologia</label><p>
                {!!  $content->methodology!!}</p>
                <textarea name="methodology" id="methodology{{$content->id}}" class="d-none form-control" ></textarea>

                <hr><label>Estrategia Evalución</label><p>
                {!!  $content->evaluation!!}</p>
                <textarea name="evaluation" id="evaluation{{$content->id}}" class="d-none form-control" ></textarea>
                

                </form>
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