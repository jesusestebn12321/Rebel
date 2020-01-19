@extends('pdf.layouts.app')
<title>Equivalencia</title>
@section('style_inline')
<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Times New Roman"; font-size:x-small }
		th, td{
			border:2px solid black !important;
		}
		
		table {
			width: 80% !important;
			margin-left: 2cm !important;
			margin-right: 3cm !important;
			margin-top: 2cm !important;
			margin-bottom: 2cm !important;
			/*margin-top: 5%;*/
			/*min-height: 96% !important;*/
		} 
		
		td{
			/*darle uniformidad a los bordes tablas*/
			border:  1px solid black!important;
		}

		.reporte-campo-texto {
			word-break: break-all !important;
			text-align: left !important;
			font: 11px monospace !important;
		} 		

		.columna-invisible {
			border-color: transparent !important;
		}

		.contenido-invisible {
			color: transparent !important;
		}

		.titulo-header-reporte {
			font-size: 11px;
		}

		@media print {
		  .nueva-pagina {
		    	page-break-before: always;
		  }
		}

		.nueva-pagina {
			/*margin-top: 8cm !important;*/
			/*position: absolute !important;*/
		}
	</style>
@endsection
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

<table cellspacing="0" border="0" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 20px; padding-left: 10px;">
	<colgroup width="40"></colgroup>
	<colgroup width="40"></colgroup>
	<colgroup width="40"></colgroup>
	<colgroup width="40"></colgroup>
	<colgroup width="315"></colgroup>
	
	<tbody>
	
	@foreach($contents as $items)
	<thead>
		<tr>
			<th colspan="10" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><h3>Unidad Curricular.</h3></th>
		</tr>
		<tr>
			<th colspan="10" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><h4>{{$items->matters->matter }}</h4></th>
		</tr>	
	</thead>	
	<thead>
		<tr>
			<th colspan="10" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"> Contenido</th>
		</tr>
		<tr>
			<th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">ID</font></b></th>

			<th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Codigo</font></b></th>


	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Titulo</font></b></th>
	        
			<th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Contenido</font></b></th>
	        
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Introduccion</font></b></th>

	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Creada</font></b></th>
		</tr>
	</thead>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{!! $items->id !!}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{!! $items->slug !!}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{!! $items->title !!}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{!! $items->content !!}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{!! $items->introdution !!}</font></b>

		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{!! $items->created_at !!}</font></b>
		</td>
	</tr>
	@endforeach
	</tbody>
	<tfoot><tr><td></td></tr></tfoot>
</table>
@endsection