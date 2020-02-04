@extends('layouts.appDashboard')
@section('title','| Dashboard')
@section('nameTitleTemplate','Dashboard')
@section('header_js')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('js')

<script type="text/javascript">
  var area_slug=$('#area_slug');
  var html='';
  area_slug.click(function(){
    if(area_slug.val()!=0){
      $.ajax({
        type: "GET",
        url: APP_URL+"/CareerPublic/"+area_slug.val(),
        dataType: "json"
        ,success: function (response) {
          console.log('success');

          $('#div_career').removeClass('d-none');
          html='<option value="0">Carreras</option>';
          for (var i = 0; response.length>i ; i++){ 
            html+='<option value="'+response[i].slug+'">'+response[i].id+' - '+response[i].career+'</option>';
          }
          $('#career').html(html);
          //$('body > div > div.header.pb-8.pt-5.pt-lg-8.d-flex.align-items-center > div > div > div > div > div > div').append('<div class="col mb-6 pt-5 mb-xl-0 alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p>Exito</p></div>');


        }
      });
    }
  });
  $('#career').click(function(){
    if($('#career').val()!=0){
      $('#button_download').removeClass('d-none');
    }
  });
  $('#last_date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });


</script>
@endsection
@include('layouts.modales.content.modalShowContent')
@include('layouts.modales.PDF.suveryDownload')
@include('layouts.modales.PDF.searchContent')
@section('mensaje')
@if (Session::has('messages'))
	{!! Session::get('messages') !!}
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
