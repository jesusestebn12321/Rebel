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
        <div class="col-12 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
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






                <a href="#" class="btn btn-sm btn-info float-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="truearia-expanded="false" title="Retroceder versión"><i class="fa fa-upload"></i></a>


                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Versiones!</h6>
                    </div>
                    <a href="{{route('profile-index')}}" class="dropdown-item">
                        <i class="fa fa-vimeo"></i>
                        <span>Version 1</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('profile-index')}}" class="dropdown-item">
                        <i class="fa fa-vimeo"></i>
                        <span>Version 2</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('profile-index')}}" class="dropdown-item">
                        <i class="fa fa-vimeo"></i>
                        <span>Version 3</span>
                    </a>
                </div>

               

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
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3 class="text-center">
                  <blockquote>{!!$item->title!!}</blockquote>
                </h3>
                <hr class="my-4">
                <blockquote>{!! $item->content !!}</blockquote>
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