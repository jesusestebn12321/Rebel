<div style="height: 20% !important;padding: 15px; padding-left: 10px">

			<p align=CENTER style="margin-left: .5in; margin-bottom: 0in">
				<img src="{{asset('logo/unerg.png')}}" name="image1.png" align="left" width="87" height="36" border=0>
				<font>
					<font style="font-size: 9pt">REPÚBLICA BOLIVARIANA DE VENEZUELA
					</font>
				</font>
				<div align="right" style="float: right; position: relative !important">
					<img style="padding: 0px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($url)) !!} ">
				</div>
			</p>
			<p align=CENTER style="margin-left: .5in; margin-bottom: 0in"><font><font style="font-size: 9pt">UNIVERSIDAD
			NACIONAL EXPERIMENTAL DE LOS LLANOS RÓMULO GALLEGOS</font></font></p>
			<p align=CENTER style="margin-left: .5in; margin-bottom: 0in"><font><font style="font-size: 9pt">VICERRECTORADO
			ACADÉMICO</font></font></p>
			<p align=CENTER style="margin-left: .5in; margin-bottom: 0in"><font><font style="font-size: 9pt">SAN
			JUAN DE LOS MORROS</font></font></p>
			<p align=CENTER style="margin-left: .5in; margin-bottom: 0in"><font><font style="font-size: 9pt">ESTADO
			GUÁRICO</font></font></p>
			<p align=CENTER style="margin-bottom: .5in; background: #ffffff; border: none; font-weight: normal; page-break-inside: auto; widows: 0; orphans: 0; ; page-break-after: auto">
			</p>
			<div style="display:inline-block; margin-left: 10px;padding-bottom:5px;padding-top:5px;margin-top:-10px;top:-10px;position:relative">
				<div>
					<b>Nombre y Apellido:</b>{{Auth::user()->name}} {{Auth::user()->lastname}}
				</div>
				<div>
					<b>Cedula:</b>{{Auth::user()->dni}}
				</div>
				<div>
					<b>E-mail:</b>{{Auth::user()->email}}
				</div>
		</div>
	</div>