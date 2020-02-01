<header style="margin-bottom: 30px !important">
	<p align="center">
		<img style="float: left; position: relative !important;padding:0px" src="{{public_path('/logo/unerg.png')}}" name="image1.png" align="left" width="350" height="170">
	</p>
	<span class="p" style="padding-top:30px !important;padding-bottom:10px !important;display:inline-block;margin-left:40%">REPÚBLICA BOLIVARIANA DE VENEZUELA
		</span>
	<span align="center" class="p" style="display:inline-block;margin-left:30%;padding-bottom:-15px !important">UNIVERSId NACIONAL EXPERIMENTAL DE LOS LLANOS RÓMULO GALLEGOS</span>
	<span align="center" class="p" style="display:inline-block;margin-left:42%;padding-bottom:-15px ">VICERRECTORADO ACADÉMICO</span>
	<span align="center" class="p" style="display:inline-block;margin-left:43%;padding-bottom:-17px !important">SAN JUAN DE LOS MORROS</span>
	<spam align="center" class="p" style="display:inline-block;margin-left:46%;padding-bottom:-10px !important">ESTADO GUÁRICO</spam>
	
	<spam align="right" style="float: right; position: relative !important;top:-65;padding: 0px">
		<img style="padding: 0px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($url)) !!} ">
	</spam>
	<br><br>
	<p align="center" >
		 @guest
		 @else
			<ul style="list-style: none">
				<li class="p">
					@if(Auth::user()->hasRole(1))
					<b>Administrador</b>
					@elseif(Auth::user()->hasRole(2))
					<b>Profesor</b>
					@else
					<b>Estudiante</b>
					@endif
				</li>
				<li class="p">
					<b>Nombre y Apellido: </b>{{Auth::user()->name}} {{Auth::user()->lastname}}
				</li>
				<li class="p">
					<b>Cedula: </b>{{Auth::user()->dni}}
				</li>
				<li class="p">
					<b>E-mail: 	</b>{{Auth::user()->email}}
				</li>
			</ul>
		@endguest
	</p>
	<p align="right" valign='top'  style="font-size:19px !important">
		Fecha: {{$today}}
	</p>
</header>