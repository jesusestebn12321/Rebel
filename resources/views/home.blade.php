@extends('layouts.appDashboard')
@section('title','| Dashboard')
@section('nameTitleTemplate','Dashboard')
@section('js')
<script src="{{asset('plugins/js/main.js')}}"></script>

<script>
	$('#areaOp').click(function(){
		var career=$('#careerProfile');
		var area=$('#areaOp');
		selectHidden(area,career);

	});
	$('#careerProfile').click(function(){
		var career=$('#careerProfile');
		var matter=$('#matterOp');
		var area=$('#areaOp');

    	// career.html('');
		// alert(APP_URL+"/Career/Show/"+area.val());
		$.ajax({
			method: "GET",
			url: APP_URL+"/Career/Show/"+area.val(),
			dataType: "json",
			success: function (response) {
				
				// console.log(respose);
				for (var i=0; i<response.length;i++) {
					$('#careerProfile').append('<option value="'+response[i].id+'">'+response[i].career+'</option>');
				}
			}
		});

		selectHidden(area,matter);
	});
	$('#matterOp').click(function(){
		var career=$('#careerProfile');
		var matter=$('#matterOp');
		$.ajax({
			method: "GET",
			url: APP_URL+"/Matter/Show/"+career.val(),
			dataType: "json",
			success: function (response) {
				for (var i=0; i<response.length;i++) {
					matter.append('<option value="'+response[i].id+'">'+response[i].matter+'</option>');
				}
			}
		});

	});
	function selectHidden(atr1,atr2){
		if(atr1.val()==0){
			atr2.addClass('d-none');
			return false;
		}else{
			atr2.removeClass('d-none');
			atr2.val(0);
			return true;
		}
	}
	
</script>
@endsection
@section('content')
@if(Auth::user()->hasRole(2) && !isset($matter_user))  
@include('layouts.modales.profile.profileModal')
@endif
@if(!Auth::user()->hasRole(3))  
<div class="row">
	@if(Auth::user()->hasRole(1))
	<div class="col-xl-12 mb-5 mb-xl-2">
		<div class="card bg-gradient-default shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col">
						<h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
						<h2 class="text-white mb-0">Sales value</h2>
					</div>
					<div class="col">
						<ul class="nav nav-pills justify-content-end">
							<li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{labels: labelItems,"datasets":[{"data":"dataItems"}]}}' data-prefix="$" data-suffix="k">
								<a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
									<span class="d-none d-md-block">Mensual</span>
									<span class="d-md-none">M</span>
								</a>
							</li>
							<li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"labels":"labelS","datasets":"dataS"}]}}' data-prefix="$" data-suffix="k">
								<a href="#" class="nav-link py-2 px-3" data-toggle="tab">
									<span class="d-none d-md-block">Semanal</span>
									<span class="d-md-none">S</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body">
				<!-- Chart -->
				<div class="chart">
					<!-- Chart wrapper -->
					<canvas id="chart-sales" class="chart-canvas"></canvas>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="col-xl-12">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Estadisticas</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<!-- Chart -->
				<div class="chart">
					<canvas id="chart" class="chart-canvas"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endsection
