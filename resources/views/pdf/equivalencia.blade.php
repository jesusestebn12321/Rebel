@extends('pdf.layouts.app')
<title>Equivalencia</title>
@section('content')
	<div style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 20px; padding-left: 10px">
	<div style="float: right; position: relative !important">
	<img style="padding: 0px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($url)) !!} ">
	</div>
	<div style="width:60px;height:60px;display:inline-block;">
		<img style="width:100%;height:100%" class="reporte-logo" class="user-image" alt="Logo">
	</div>
	<div style="display:inline-block; margin-left: 10px;padding-bottom:10px;padding-top:10px;margin-top:-10px;top:-10px;position:relative">
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
	<center>
		<h2 class="titulo-header-reporte">sadasdasd</h2>
	</center>
</div>
<table cellspacing="0" border="0">
	<colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="315"></colgroup><colgroup width="136"></colgroup>
	<thead>
		<tr>
			
			<th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">ID</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Universidad</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Areas</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Coordenadas</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Creada</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Editada</font></b></th>
		</tr>
	</thead>
	<tbody>
	@foreach($contents as $items)
	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $items }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $items }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $items }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $items }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $items }}</font></b>
		</td>
	</tr>
	@endforeach
	</tbody>
	<tfoot><tr><td></td></tr></tfoot>
</table>
@endsection