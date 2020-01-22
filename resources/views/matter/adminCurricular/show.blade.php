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
              <th scope="col">Versión</th>
              <th scope="col">Estatus</th>
              <th scope="col">Validado</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          @forelse($matter->content as $item)
            <tr>
              <td>{!!$item->id!!}</td>
              <td>{!!$item->slug!!}</td>
              <td>{!!$item->version!!}</td>
              <td>
                @if($item->status==false)
                  <span>{{$item->status==true?'actualizada':'Desactualizada'}}</span>
                  @else
                  <span>{{$item->status==true?'Actualizada':'Desactualizada'}}</span>
                @endif
              </td>
              <td>
                @if($item->confirmation==false)
                  <span>{{$item->confirmation==true?'confimada':'espera por la confirmación....'}}</span>
                  @else
                  <span>{{$item->confirmation==true?'confimada':'espera por la confirmación....'}}</span>
                @endif
              </td>
              <td>
                {{$item->created_at}}
              </td>
              <td>
                {{$item->updated_at}}
              </td>
              <td>
                @if($item->confirmation==true)
                  <a href="{{route('remove.content',$item->slug)}}" class="btn btn-sm btn-danger">Desautorizar</a>
                @elseif($item->confirmation==false)
                  <a href="{{route('verify.content',$item->slug)}}" id="edit1_{{$item->id}}" class="btn btn-sm btn-info">Verificar</a>
                @endif
                <a href="{{route('Contents.show', $item->slug)}}" class="btn btn-sm btn-warning">Ver</a>
              </td>
            </tr>
          @empty
          <tr><td>No Hay ningun contenido para esta unidad curricular</td></tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection