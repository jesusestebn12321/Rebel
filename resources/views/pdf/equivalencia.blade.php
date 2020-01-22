@extends('pdf.layouts.app')
<title>Equivalencia</title>
@section('style_inline')
<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Times New Roman"; font-size:x-small }
		th, td{
			border:2px solid black !important;
		}
		
		table {
			width: 126.2% !important;
			margin-left: 2cm !important;
			margin-right: 3cm !important;
			margin-top: .1cm !important;
			margin-bottom: 2cm !important;
			/*margin-top: 5%;*/
			min-width: 100% !important;
			min-height: 100% !important;
		} 
		
		td{
			/*darle uniformidad a los bordes tablas*/
			border:  1px solid black !important;
			width:100%;
			border-top: 1px solid #000001 !important;
			border-bottom: 1px solid #000001 !important;
			border-left: 1px solid #000001 !important;
			border-right: 1px solid #000001 !important;
			padding-top: 0in;
			padding-bottom: 0in;
			padding-left: 0.02in;
			padding-right: 0.08in; 
			background: #ffffff !important;
		}
		p{
			background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto;

		}
		font{
			background: #ffffff !important;
			color:#000000 !important;
			font-family: Arial, serif;
		}
		span{
			color:#000000 !important;
			background: #ffffff !important;
			font-variant: normal;
			text-decoration: none;
			font-style: normal

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
			/*
			margin-top: 8cm !important;
			position: absolute !important;
				
			*/
		}
	</style>
@endsection
@section('content')
	<div style="padding: 15px; padding-left: 10px">

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
@foreach($contents as $item)
<table width="60" cellpadding="7" cellspacing="0" >
	<col width=12>
	<col width=7>
	<col width=6>
	<col width=1>
	<col width=11>
	<col width=2>
	<col width=1>
	<col width=5>
	<col width=5>
	<tr>
		<td colspan=9 width=20 Valign="center">
			<p align=center>
				<h3><b>PROGRAMA</b></h3>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan=9 Valign=TOP>
			<p align=CENTER>
				<span>
				<font>{{$item->matters->career->career}}</SPAN></font>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan=9 Valign=TOP>
			<p align=JUSTIFY>
				<span><font><span><font><font><span><B><span>UNIDAD CURRICULAR</SPAN></b></SPAN></font></font></SPAN></font></SPAN>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=20 Valign=TOP>
			<p align=LEFT>
			<font><font>{{ $item->matters->matter }}</font></font></p>
		</td>
	</tr>
	<tr>
		<td ROWSPAN=2 width=120>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>SEMESTRE</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td ROWSPAN=2 width=78>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>CÓDIGO</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td ROWSPAN=2 colspan=2 width=93>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>CRÉDITOS</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td ROWSPAN=2 width=118>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>CARÁCTER</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=4 width=1>
			<p align=CENTER>
			<span><font><B>HORAS*</b></font></span></p>
		</td>
	</tr>
	<tr>
		<td colspan=2 width=53>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>HT</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td width=53>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>HL</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td width=52>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>HP</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td>
			<p align=CENTER><font size="3">{{$item->matters->semester}}</font></p>
		</td>
		<td width=78>
			<p align=CENTER><font><font>{{$item->matters->slug}}</font></font>
			</p>
		</td>
		<td colspan=2 width=93>
			<p align=CENTER>
			<font><font>{{$item->matters->credit}}</font></font></p>
		</td>
		<td width=118>
			<p align=CENTER>
			<span><font><span><font><font><span><span>OBLIGATORIO</SPAN></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=2 width=53>
			<p align=CENTER>
			<font><font>{{$item->matters->ht}}</font></font></p>
		</td>
		<td width=53>
			<p align=CENTER>
			<font><font>{{$item->matters->hl}}</font></font></p>
		</td>
		<td width=52>
			<p align=CENTER>
			<font><font>{{$item->matters->hp}}</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=3 width=289>
			<p align=LEFT>
			<span><font><span><font><font><span><B><span>DIRECCIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=6 width=346>
			<p align=LEFT>
			<span><font><span><font><font><span><B><span>DEPARTAMENTO</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=3 width=289>
			<p align=CENTER>
			<font>{{$item->matters->career->area->area}}</font></p>
		</td>
		<td colspan=6 width=346>
			<p align=CENTER>
			<span><font><span><font>{{$item->matters->career->area->departamento?'me falta campo':'me falta campo'}}</font></p>
		</td>
	</tr>
	<tr>
		<td colspan=6 width=484>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>AUTORES</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=3 width=151>
			<p align=CENTER>
			<span><font><span><font><font><span><B><span>VERSIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=6 width=289 HEIGHT=10>
			<UL>
				@foreach($item->matters->matter_user as $items)
				<LI><p align=LEFT style="margin-bottom: 0in;">
					{{$items->teacher->user->name}}.
					{{$items->teacher->user->lastname}}
				</p>
				@endforeach
			</UL>
		</td>
		<td colspan=3 width=151>
			<p align=CENTER>
			<span><font>{{$item->version}}</font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=20 Valign=TOP>
			<p align=LEFT>
			<span><font><span><font><font><span><B><span>JUSTIFICACIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=20 Valign=TOP>
			<p align=JUSTIFY><font><font>{{$item->justification}}</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=20 Valign=TOP>
			<p align=LEFT>
			<span><font><span><font><font><span><B><span>PROPÓSITOS</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=20 Valign=TOP>
			<p align=JUSTIFY><font><font>{{$item->purpose}}</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=20 Valign=TOP>
			<p align=LEFT>
			<span><font><span><font><font><span><B><span>CONTENIDO
			PROGRAMÁTICO</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=20 Valign=TOP>
		 <p align=JUSTIFY><font><font>{{$item->content}}</font></font></p>
		</td>
	</tr>
	<tr Valign=TOP>
		<td colspan=4 width=15>
			<p align=LEFT>
			<span><font><span><font><font><span><B><span>ESTRATEGIAS
			METODOLÓGICAS</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=5 width=15>
			<p align=LEFT>
			<span><font><span><font><font><span><B><span>ESTRATEGIAS
			DE EVALUACIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr Valign=TOP>
		<td colspan=4 width=15><p align=JUSTIFY><font><font>{{$item->methodology}}</font></font></p>
		</td>
		<td colspan=5 width=15><p align=JUSTIFY><font><font>{{$item->evaluation}}</font></font></p>
		</td>
	</tr>
</table>
@endforeach
@endsection