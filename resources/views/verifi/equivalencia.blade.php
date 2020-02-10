@extends('layouts.appDashboard')
@section('title','| Verificación')
@section('nameTitleTemplate','Verificación de Descarga')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="card  card-profile shadow">
			 <div class="row justify-content-center">
        <div class="col-12">
          <div class="card-profile-image">
            <a href="#">
              <img src="{{ asset('template/assets/img/theme/user.jpg') }}" class="rounded-circle">
            </a>
          </div>
          <div class="card-header">
            <div class="col-12  ml-8 text-left">
				<h2 class="mb-0">Descarga</h2>
            </div>
          </div>
        </div>
      </div><br>
			<div class="card-body pt-0 pt-md-6">
				<div class="row">
					@if($download->user)
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
					@else

					<div class="col-lg-12">
						<div class="row">
							<div class="col"><h3><i class="fa fa-user"></i>User-Agent:</h3></div>
							<div class="col"><b>{{$download->user_agent}}</b></div>
						</div>
					</div>
					@endif
					<div class="col-lg-12">
						<div class="row">
							<div class="col"><h3><i class="fa fa-star"></i> Estado:</h3></div>
							<div class="col"><b>{{$download->status?'Validado':'V'}}</b></div>
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
