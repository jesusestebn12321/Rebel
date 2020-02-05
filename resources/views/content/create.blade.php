@extends('layouts.appDashboard')
@section('title','| Contenido')
@section('nameTitleTemplate','Crear Contenido')
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
            <form action="{{route('Contents.coordinador.store')}}" method="post"> 
              {{ csrf_field() }}
              <input type="hidden" name="matter_id" value="{{$matter->id}}">
              <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
                <input required type="text" class="form-control" name="version" placeholder="Versión">
                @if ($errors->has('version'))
                <span class="help-block">
                  <strong>{{ $errors->first('version') }}</strong>
                </span>
                @endif
              </div>
              
              <hr class="my-4">
              <div class="form-group{{ $errors->has('justification') ? ' has-error' : '' }}">
                <h3 class="text-center">
                  <label>Justificacion:</label>
                </h3>
                <textarea required id="justification" class=" form-control" name="justification"></textarea>
                @if ($errors->has('justification'))
                <span class="help-block">
                  <strong>{{ $errors->first('justification') }}</strong>
                </span>
                @endif
              </div>
              
              <hr class="my-4">
              <div class="form-group{{ $errors->has('purpose') ? ' has-error' : '' }}">
                <h3 class="text-center">
                  <label>Proposito:</label>
                </h3>
                
                <textarea required name="purpose" id="purpose" class=" form-control"></textarea>
                @if ($errors->has('purpose'))
                <span class="help-block">
                  <strong>{{ $errors->first('purpose') }}</strong>
                </span>
                @endif
              </div>
              
              <hr class="my-4">
              <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <h3 class="text-center">
                  <label>Contenido Programático:</label>
                </h3>
                
                <textarea required name="content" id="content" class=" form-control" ></textarea>
                @if ($errors->has('content'))
                  <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                  </span>
                @endif
              </div>

              <hr class="my-4">
              <div class="form-group{{ $errors->has('methodology') ? ' has-error' : '' }}">
                <h3 class="text-center">
                  <label>Estrategia Metodológica:</label>
                </h3>
                
                <textarea required name="methodology" class=" form-control" ></textarea>
                @if ($errors->has('methodology'))
                  <span class="help-block">
                    <strong>{{ $errors->first('methodology') }}</strong>
                  </span>
                @endif
              </div>

              <hr class="my-4">
              <h3 class="text-center">
                <label>Estrategia Evaluativa:</label>
              </h3>
              
              <textarea required name="evaluation" id="evaluation" class=" form-control" ></textarea>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-center">
              <button type="submit" class="btn btn-block btn-success">Crear</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection