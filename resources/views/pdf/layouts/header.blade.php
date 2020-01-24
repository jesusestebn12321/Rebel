<header style="margin-bottom: 30px !important">
	<p align="center">
		<img style="float: left; position: relative !important;padding:0px" src="{{public_path('/logo/unerg.png')}}" name="image1.png" align="left" width="350" height="170">
		<font class="p" style="background: red;display:inline-block;margin-left:40%">REPÚBLICA BOLIVARIANA DE VENEZUELA
		</font>
	</p>
	<p align="center" class="p" style="background: red;display:inline-block;margin-left:30%">UNIVERSId NACIONAL EXPERIMENTAL DE LOS LLANOS RÓMULO GALLEGOS</p>
	<p align="center" class="p" style="background: red;display:inline;margin-left:20%">VICERRECTORADO ACADÉMICO</p>
	<p align="center" class="p" style="background: red;display:inline;margin-left:23%">SAN JUAN DE LOS MORROS</p>
	<spam align="center" class="p" style="background: red;margin-left:20%">ESTADO GUÁRICO</spam>
	
	<spam align="right" style="float: right; position: relative !important;top:-95;padding: 0px">
		<img style="padding: 0px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($url)) !!} ">
	</spam>
	
	<p align="center" >
		<ul style="list-style: none">
			<li class="p">
				<b>Nombre y Apellido:</b>{{Auth::user()->name}} {{Auth::user()->lastname}}
			</li>
			<li class="p">
				<b>Cedula:</b>{{Auth::user()->dni}}
			</li>
			<li class="p">
				<b>E-mail:</b>{{Auth::user()->email}}
			</li>
		</ul>
	</p>
</header>