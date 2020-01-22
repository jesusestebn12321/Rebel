@section('title','| Unidades Curriculares')
@section('nameTitleTemplate','Unidades Curriculares')	
@section('js')
<script>
  	function contentNumber(){
  		var xContetn=$('#numberContent').val();
  		
  		for (var i = 0; xContetn >	 i ; i++) {
  			
  			$('#contentMatters').append('<hr><div class="form-group">'+
                        '<input type="text" placeholder="Title '+i+'" class="form-control" name="title_'+i+'" autofocus required ></div>'+
                        '<div class="form-group">'+
                        '<input type="text" placeholder="Contenido '+i+'" class="form-control" name="content_'+i+'" autofocus required ></div>');
  		}
  	}
  	function loadContent(arg){
  		$('#matter_id').val(arg);
  	}

</script>
@endsection
@section('headerContent')
<div class="container">
  <div class="row">
    <div class="col-xl-6 col-lg-6 pt-4">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Crear Unidad Curricular</span>
            </div>
            <div class="col-auto">
              <a href="#" title data-original-title="Agregar Unidad Curricular" data-target='#createMatter' data-toggle='modal' class='text-white'>
                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                  <i class="fa fa-plus"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 pt-4">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h2 font-weight-bold mb-0">Reporte de las Unidades Curriculares</span>
            </div>
            <div class="col-auto">
              <a href="{{route('report.matter')}}" class='text-white'>
                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                  <i class="fa fa-download"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include('layouts.modales.Matter.modalCreateMatter')
@include('layouts.modales.content.modalCreateContents')
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
                      <th scope="col">Semestre</th>
                      <th scope="col">Credito</th>
                      <th scope="col">HL</th>
                      <th scope="col">HT</th>
                      <th scope="col">HP</th>
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
                          <td>
                            <input type="hidden" id='{{$item->id}}' value='{{$item->semester}}'>
                            {{ $item->semester }}
                          </td>
                          <td>
                            <input type="hidden" id='{{$item->id}}' value='{{$item->credit}}'>
                            {{ $item->credit }}
                          </td>
                          <td>
                            <input type="hidden" id='{{$item->id}}' value='{{$item->hl}}'>
                            {{ $item->hl }}
                          </td>
                          <td>
                            <input type="hidden" id='{{$item->id}}' value='{{$item->ht}}'>
                            {{ $item->ht }}
                          </td>
                          <td>
                            <input type="hidden" id='{{$item->id}}' value='{{$item->hp}}'>
                            {{ $item->hp }}
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
        </div>
    </div>
</div>
@endsection