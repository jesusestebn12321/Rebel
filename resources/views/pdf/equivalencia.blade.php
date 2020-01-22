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
			margin-top: 2cm !important;
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
	<div style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 20px; padding-left: 10px">

			<p align=CENTER style="margin-left: 1.47in; margin-bottom: 0in">
				<font FACE="Arial, serif">
					<font SIZE=2 style="font-size: 9pt">REPÚBLICA BOLIVARIANA DE VENEZUELA
					</font>
				</font>
				<img src="{{asset('template/assets/img/brand/blue.png')}}" name="image1.png" align="left" width="87" height="36" border=0>
			</p>
			<p align=CENTER style="margin-left: 1.47in; margin-bottom: 0in"><font FACE="Arial, serif"><font SIZE=2 style="font-size: 9pt">UNIVERSIDAD
			NACIONAL EXPERIMENTAL DE LOS LLANOS RÓMULO GALLEGOS</font></font></p>
			<p align=CENTER style="margin-left: 1.47in; margin-bottom: 0in"><font FACE="Arial, serif"><font SIZE=2 style="font-size: 9pt">VICERRECTORADO
			ACADÉMICO</font></font></p>
			<p align=CENTER style="margin-left: 1.47in; margin-bottom: 0in"><font FACE="Arial, serif"><font SIZE=2 style="font-size: 9pt">SAN
			JUAN DE LOS MORROS</font></font></p>
			<p align=CENTER style="margin-left: 1.47in; margin-bottom: 0in"><font FACE="Arial, serif"><font SIZE=2 style="font-size: 9pt">ESTADO
			GUÁRICO</font></font></p>
			<p align=CENTER style="margin-bottom: 0.88in; background: #ffffff; border: none; padding: 0in; font-variant: normal; font-style: normal; font-weight: normal; line-height: 100%; page-break-inside: auto; widows: 0; orphans: 0; text-decoration: none; page-break-after: auto">
			<BR><BR>
			</p>


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
{{--
<table cellspacing="0" border="0" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 20px; padding-left: 10px">
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
--}}

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
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="margin-right: 0in; background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span size=2>
				<h3><b>PROGRAMA</b></h3>
			</SPAN>
		</p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="margin-left: 0.28in; margin-right: 0in; text-indent: -0.06in; background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><span style="background: #ffffff">PROGRAMA
			CARRERa</SPAN></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=JUSTIFY style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">UNIDAD
			CURRICULAR</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<font FACE="Arial, serif"><font size="3">{{ $contents[0]->matters->matter }}</font></font></p>
		</td>
	</tr>
	<tr>
		<td ROWSPAN=2 width=120 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">SEMESTRE</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td ROWSPAN=2 width=78 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">CÓDIGO</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td ROWSPAN=2 colspan=2 width=93 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">CRÉDITOS</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td ROWSPAN=2 width=118 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">CARÁCTER</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=4 width=185 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">HORAS*</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=2 width=53 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">HT</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td width=53 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">HL</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td width=52 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">HP</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td bgcolor="#ffffff" style=" padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER><font face="Arial, serif" size="3">{{$contents[0]->matters->semester}}</font></p>
		</td>
		<td width=78 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; font-variant: normal; font-style: normal; page-break-inside: auto; widows: 0; orphans: 0; text-decoration: none; page-break-after: auto"><font FACE="Arial, serif"><font SIZE=2>{{$contents[0]->matters->slug}}</font></font>
			</p>
		</td>
		<td colspan=2 width=93 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<font FACE="Arial, serif"><font SIZE=2>{{$contents[0]->matters->credit}}</font></font></p>
		</td>
		<td width=118 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><span style="background: #ffffff">OBLIGATORIO</SPAN></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=2 width=53 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<font FACE="Arial, serif"><font SIZE=2>{{$contents[0]->matters->ht}}</font></font></p>
		</td>
		<td width=53 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<font FACE="Arial, serif"><font SIZE=2>{{$contents[0]->matters->hl}}</font></font></p>
		</td>
		<td width=52 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<font FACE="Arial, serif"><font SIZE=2>{{$contents[0]->matters->hp}}</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=3 width=289 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">DIRECCIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=6 width=346 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">DEPARTAMENTO</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=3 width=289 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<font face="Arial, serif" size="2">{{$contents[0]->matters->career->area->area}}</font></p>
		</td>
		<td colspan=6 width=346 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font color="#000000"><span style="text-decoration: none"><font face="Arial, serif" size="2">{{$contents[0]->matters->career->area->departamento?'me falta campo':'me falta campo'}}</font></p>
		</td>
	</tr>
	<tr>
		<td colspan=6 width=484 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">AUTORES</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=3 width=151 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">VERSIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=3 width=289 HEIGHT=10 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<UL>
				@foreach($contents[0]->matters->matter_user as $item)
				<LI><p align=LEFT style="margin-bottom: 0in; background: #ffffff; border: none; padding: 0in; font-variant: normal; font-style: normal; page-break-inside: auto; widows: 0; orphans: 0; text-decoration: none; page-break-after: auto">
					{{$item->teacher->user->name}}.
					{{$item->teacher->user->lastname}}
				</p>
				@endforeach
			</UL>
		</td>
		<td colspan=3 width=181 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<UL>
				<LI><p align=LEFT style="margin-bottom: 0in; background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
				<font FACE="Arial, serif"><font SIZE=2>ISAAC SEIJAS</font></font></p>
				<LI><p align=LEFT style="margin-bottom: 0in; background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
				<font FACE="Arial, serif"><font SIZE=2>FELIX GALINDO</font></font></p>
				<LI><p><font FACE="Arial, serif"><font SIZE=2>ALBERTO G.
				RODRIGUEZ U. </font></font>
				</p>
			</UL>
		</td>
		<td colspan=3 width=151 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=CENTER style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><span style="background: #ffffff">201</SPAN></SPAN></font></font></SPAN></font></SPAN><font FACE="Arial, serif"><font SIZE=2>9</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">JUSTIFICACIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=JUSTIFY><font FACE="Arial, serif"><font SIZE=2>justificacion</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">PROPÓSITOS</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=JUSTIFY><font FACE="Arial, serif"><font SIZE=2>proposito</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">CONTENIDO
			PROGRAMÁTICO</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr>
		<td colspan=9 width=649 Valign=TOP BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
		 CONTENIDO
			PROGRAMÁTICO
		</td>
	</tr>
	<tr Valign=TOP>
		<td colspan=4 width=318 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">EStrATEGIAS
			METODOLÓGICAS</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
		<td colspan=5 width=317 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<p align=LEFT style="background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto">
			<span style="font-variant: normal"><font COLOR="#000000"><span style="text-decoration: none"><font FACE="Arial, serif"><font SIZE=2><span style="font-style: normal"><B><span style="background: #ffffff">EStrATEGIAS
			DE EVALUACIÓN</SPAN></b></SPAN></font></font></SPAN></font></SPAN></p>
		</td>
	</tr>
	<tr Valign=TOP>
		<td colspan=4 width=318 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">EStrATEGIAS
			METODOLÓGICAS
		</td>
		<td colspan=5 width=317 BGCOLOR="#ffffff" style="padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">EStrATEGIAS
			DE EVALUACIÓN
		</td>
	</tr>
</table>
@endsection