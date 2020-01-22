@extends('layouts.appDashboard')
@section('title','| Contenido')
@section('js')
<script type="text/javascript">
  $('textarea').wysihtml5({
    toolbar: { fa: true }
  });
</script>
@endsection
@section('content')
<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
      <div class="card card-profile shadow">
        <div class="card-body pt-0 pt-md-4">
          <div class="text-center">
            <h3 class="text-center">
            <form action="{{route('Contents.up_date',$content->slug)}}">
              <input type="hidden" id="id_matter" value="$matter_user->matter[0]->id" >
                
                <hr class="my-4">
                <label>Justificacion:</label>
                <textarea id="justification" class=" form-control" name="justification">{!!$content->justification!!}</textarea>
              </h3>
              <hr class="my-4">
              <label>Proposito:</label>
              
              <textarea name="purpose" id="purpose" class=" form-control" >{!! $content->purpose !!}</textarea>

              <hr class="my-4">
              <label>Contenido Programático:</label>
              
              <textarea name="content" id="content" class=" form-control" >{!! $content->content !!}</textarea>

              <hr class="my-4">
              <label>Estrategia Metodológica:</label>
              
              <textarea name="methodology" id="methodology" class=" form-control" >{!! $content->methodology !!}</textarea>

              <hr class="my-4">
              <label>Estrategia Evaluativa:</label>
              
              <textarea name="evaluation" id="evaluation" class=" form-control" >{!! $content->evaluation !!}</textarea>
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
              <button type="submit" class="btn btn-block btn-info">Editar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection