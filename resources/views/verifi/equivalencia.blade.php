@extends('layouts.appDashboard')
@section('title','| Verificación')
@section('nameTitleTemplate','Verificación de Descarga')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="card  shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col">
						<h2 class="mb-0">Descarga</h2>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col"><h3><i class=" fa fa-user"></i> Usuario:</h3></div>
							<div class="col"><b>{{$download->user->name}} {{$download->user->lastname}}</b></div>
						</div>		
					</div>
					<div class="col-lg-12">
						<div class="row">
							<div class="col"><h3><i class="fa fa-credit-card"></i> Cedula:</h3></div>
							<div class="col"><b>{{$download->user->dni}}</b></div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="row">
							<div class="col"><h3><i class="fa fa-mail-forward"></i> E-mail:</h3></div>
							<div class="col"><b>{{$download->user->email}}</b></div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="row">
							<div class="col"><h3><i class="fa fa-star"></i> Estado:</h3></div>
							<div class="col"><b>{{$download->status?'V':'V'}}</b></div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<h3>Fecha de descarga:{{$download->created_at}}</h3>
			</div>
		</div>
	</div>
</div>
@endsection
