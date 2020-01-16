@extends('layouts.appDashboard')
@section('title','| Contenido')
@section('js')
<script type="text/javascript">
  $('#content').wysihtml5({
    toolbar: { fa: true }
  });
  $('#title').wysihtml5({
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
    <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
      <div class="card card-profile shadow">
        <div class="card-body pt-0 pt-md-4">
          <div class="text-center">
            <h3 class="text-center">
            <form action="{{route('Contents.up_date',$content->slug)}}">
              <input type="hidden" id="id_matter" value="$matter_user->matter[0]->id" >
                
                <hr class="my-4">
                <label>Titulo:</label>
                <textarea id="title" class=" form-control" name="title">{!!$content->title!!}</textarea>
              </h3>
              <hr class="my-4">
              <label>Introduccion:</label>
              
              <textarea name="introdution" id="introdution" class=" form-control" >{!! $content->introdution !!}</textarea>

              <hr class="my-4">
              <label>Contenido:</label>
              
              <textarea name="content" id="content" class=" form-control" >{!! $content->content !!}</textarea>
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