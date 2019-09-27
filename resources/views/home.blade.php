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
@if(Auth::user()->hasRole(1) && !isset($matter_user))  
	@include('layouts.modales.profile.profileModal')
@endif
@if(!Auth::user()->hasRole(2))  
<div class="row">

	<div class="col-xl-12">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Total orders</h2>
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
