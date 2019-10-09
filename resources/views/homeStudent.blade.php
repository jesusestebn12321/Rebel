@extends('layouts.appDashboard')
@section('title','| Dashboard')
@section('nameTitleTemplate','Dashboard')
@section('content')
<div class="row">
	<div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Unidades Curriculares</h2>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive">
        	<table class="table">
        		<thead>
        			<tr>
        				<th>Codigo</th>
        				<th>Unidad Curricular</th>
        			</tr>
        		</thead>
        		<tbody>
        			@forelse($matter as $item)
        			<tr>
        				<td>{{$item->matter->slug}}</td>
        				<td>{{$item->matter->matter}}</td>
        			</tr>
        			@empty
        			<tr>
        				<td>no hay un coño</td>
        			</tr>
        			@endforelse
        		</tbody>	
        	</table>
        </div>
      </div>
    </div>
</div>
@endsection
