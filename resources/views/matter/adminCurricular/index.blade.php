@extends('layouts.appDashboard')
@section('title','| Unidades Curriculares')
@section('nameTitleTemplate','Unidades Curriculares')	
@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="text-white mb-0">Unidades Curriculas</h3>
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
                      	<th scope="col">Nª contenido</th>
	                    <th scope="col">Created_at</th>
	                    <th scope="col">Updated_at</th>
	                    <th scope="col"></th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@forelse($matter as $item)
	                    <tr id='{{$item->id}}'>
	                    	<input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
	                      	<td>
	                      		{{$item->id}}
	                      	</td>
	                      	<td>
	                       		<input type="hidden" id='slug{{$item->id}}' value='{{$item->slug}}'>
	                        	{{ $item->slug }}
	                      	</td>
	                      	<td id='td_matter{{$item->id}}'>
	                       		<label id='labelEditmatter{{$item->id}}'>{{ $item->matter}}</label>
	                        	<input class='d-none' id="EditUniversity{{$item->id}}" value="{{$item->matter}}">
	                      	</td>
                          <td>{{$item->content->count()}}</td>
	                      	<td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
	                      	<td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
	                      	<td>
	                      		<a class="btn-primary btn" title="Ver Materia" href="{{route('Matters.show',$item->slug)}}"><i class="fa fa-eye"></i></a>
		                    </td>
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
            <div class="card-footer bg-default py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item ">
              {{ $matter->links() }}
            </li>
          </ul>
        </nav>
      </div>
        </div>
    </div>
</div>
@endsection