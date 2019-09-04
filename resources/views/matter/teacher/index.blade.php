@extends('layouts.appDashboard')
@section('title','| Unidades Curriculares')
@section('nameTitleTemplate','Unidades Curriculares')
@section('js')
<script>
  	function show(id){
	    $('#labelMatter').html($('#td_Matter'+id).html());
	    $('#labelTitle').html($('#td_Title'+id).html());
	    $('#labelContent').html($('#td_Content'+id).html());
	    $('#labelCreate').html($('#td_Edit'+id).html());
	    $('#labelEdit').html($('#td_Edit'+id).html());
  	}

</script>
@section('content')
@include('layouts.modales.Matter.teacher.modalCreateMatter')
@include('layouts.modales.Matter.teacher.modalShowMatter')
@include('layouts.modales.Matter.teacher.modalEditMatter')
<div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="text-white mb-0">Unidades Curricula</h3>
                </div>
                <div class="col-4 text-right">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <a href="#" title data-original-title="Agregar Universidad" data-target='#createMatter' data-toggle='modal' class='text-white'><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              	<table class="table align-items-center table-dark table-flush">
	                <thead class="thead-dark">
	                  <tr>
	                    <th scope="col">ID</th>
	                    <th scope="col">Codigo</th>
	                    <th scope="col">Verción</th>
	                    <th scope="col">Unidad Curricular</th>
	                    <th scope="col">Created_at</th>
	                    <th scope="col">Updated_at</th>
	                    <th scope="col"></th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@foreach($matter as $item)
	                    <tr id='{{$item->id}}'>
	                    	<input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
	                      	<td>
	                      		{{$item->id}}
	                      	</td>
	                      	<td>
	                       		<input type="hidden" id='slug{{$item->id}}' value='{{$item->slug}}'>
	                        	{{ $item->slug }}
	                      	</td>
	                      	<td>
	                        	<input type="hidden" id='version{{$item->id}}' value='{{$item->version}}'>
	                        	{{ $item->version }}
	                      	</td>
	                      	<td id='td_matter{{$item->id}}'>
	                       		<label id='labelEditmatter{{$item->id}}'>{{ $item->matter}}</label>
	                        	<input class='d-none' id="EditUniversity{{$item->id}}" value="{{$item->matter}}">
	                      	</td>
	                      	<td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
	                      	<td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
	                      	<td>
	                      		<a class="btn-primary btn" href="{{route('Matter.show',$item->slug)}}"><i class="fa fa-eye"></i></a>
	                        	<a class="btn-danger btn" href="{{route('Matter.destroy',$item->slug)}}"><i class="fa fa-remove"></i></a> 
	                        	<a class="btn-info btn" data-target='#editMatter' data-toggle='modal'  id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
	                        	<a class="btn-success btn" data-target='#loadContent' data-toggle='modal' onclick="loadContent({{$item->id}})" href="#!"><i class="fa fa-file"></i></a>
	                      </td>
	                    </tr>
	                  @endforeach
	                </tbody>
              	</table>
            </div>
          </div>
        </div>
</div>
@endsection