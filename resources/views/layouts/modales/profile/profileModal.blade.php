<div class="modal fade show" style="display: block; padding-right: 25.9922px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="col">
					<h3><span class="fa fa-user"></span> 
						Rellene el perfil de Profesor
					</h3>
				</div>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="{{route('MatterUser.store')}}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('areaOp') ? ' has-error' : '' }}">
						<select id="areaOp"  class='form-control' value='0' name="areaOp" size='1'>       
							<option value="0">Area</option>
							@foreach($area as $item)
							<option value="{{$item->id}}">{{$item->id}} - {{$item->area}}</option>
							@endforeach                   
						</select>
					</div>
					<div class="form-group{{ $errors->has('careerProfile') ? ' has-error' : '' }}">
						<select id="careerProfile" class='form-control d-none' value='0' name="careerProfile" size='1'> 
						<option value="0">Carrera</option>      
						
						</select>
					</div>
					<div class="form-group{{ $errors->has('matter_id') ? ' has-error' : '' }}">
						<select id="matterOp" class='form-control d-none' value='0' name="matter_id" size='1'>       
							<option value="0">Materia</option>                
						</select>
					</div>
				</div>

				<div class="modal-footer"> 
					<div class='container'>
						<div class="row">        
							<div class="col-12">
								<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>