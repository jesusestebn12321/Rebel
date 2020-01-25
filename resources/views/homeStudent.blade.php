@extends('layouts.appDashboard')
@section('title','| Dashboard')
@section('nameTitleTemplate','Dashboard')
@section('header_js')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@include('layouts.modales.content.modalShowContent')
@include('layouts.modales.PDF.suveryDownload')
@section('mensaje')
@if (Session::has('messages'))
<div class='alert alert-danger'>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<p>{{ Session::get('messages') }}</p>
</div>
@endif
@endsection
@section('content')
<div class="row mt-5">
	<div class="col">
    	<div class="card bg-default shadow">
	      	<div class="card-header bg-transparent border-0">
	        	<div class="row align-items-center">
		          	<div class="col-8">
		            	<h3 class="text-white mb-0">Unidades Curricula</h3>
		          	</div>
	        	</div>
	      	</div>
	      	<div class="table-responsive">
	         	<table class="table align-items-center table-dark table-flush">
		          	<thead class="thead-dark">
		            	<tr>
		              	<th scope="col">ID</th>
		              	<th scope="col">Codigo</th>
		              	<th scope="col">Unidad Curricular</th>
		              	<th scope="col">Contenido</th>
		              	<th scope="col">Created_at</th>
		              	<th scope="col">Updated_at</th>
		            	</tr>
		          	</thead>
		          	<tbody>
		           	@forelse($matter_user as $item)
		              	<tr>
		                 	<td>{{$item->matter->slug }}</td>
		                 	<td>{{$item->matter->version }}</td>
		                 	<td>{{$item->matter->matter}}</td>
		                 	<td><a href="#" data-target='#showContent' class="btn btn-sm btn-info" data-toggle='modal'>VER</a></td>
		                 	<td>{{$item->matter->created_at }}</td>
		                 	<td>{{$item->matter->updated_at }}</td>
		              	</tr>
		             @empty
		             	<tr>
							<td>
					        	<font class='center'>No existen registros</font>
		                 	</td>
		             	</tr>
	       			@endforelse
		          	</tbody>
	         	</table>
	      	</div>
    	</div>
  	</div>
</div>
@endsection
