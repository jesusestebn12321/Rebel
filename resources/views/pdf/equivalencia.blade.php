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
			height: 70% !important;
			margin-left: 2cm !important;
			margin-right: 3cm !important;
			margin-top: .1cm !important;
			margin-bottom: 1cm !important;
			/*margin-top: 5%;*/
			min-width: 100% !important;
			min-height: 10% !important;
		}
		h3,h4{text-transform: uppercase;}
		
		td{
			/*darle uniformidad a los bordes tablas*/
			border:  1px solid black !important;
			width:10%;
			min-height: 10px !important;
			padding: 1px;
			margin:1px;
			background: #ffffff !important;
		}
		p{
			background: #ffffff; border: none; padding: 0in; page-break-inside: auto; widows: 0; orphans: 0; page-break-after: auto;

		}
		.font{
			background: #ffffff !important;
			color:#000000 !important;
			font-family: Arial, serif;
			font: 15px !important;
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
			margin-top: 8cm !important;
			position: absolute !important;
		}
	</style>
@endsection
@section('content')
	
@foreach($contents as $key=>$item)
@include('pdf.layouts.header')
<table cellpadding="7" cellspacing="0" >
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<tr>
		<td colspan=9 Valign="center">
			<p align=center style="width: 10px">
				<h3>PROGRAMA</h3>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan=9 Valign=TOP>
			<p align=CENTER>
				<span>
				<font class="font">{{$item->matters->career->career}}</span></font>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan=9 Valign=TOP align="left">
			<p align=JUSTIFY>
				<h4>UNIDAD CURRICULAR</h4>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan=9 Valign=TOP>
			<p align=LEFT>
			<font>{{ $item->matters->matter }}</font></font></p>
		</td>
	</tr>
	<tr>
		<td ROWSPAN=2 valign="top" align="center">
			<p align=CENTER>
			<h4>SEMESTRE</h4></p>
		</td>
		<td ROWSPAN=2 valign="top" align="center">
			<p align=CENTER>
			<h4>CÓDIGO</h4></p>
		</td>
		<td ROWSPAN=2 colspan=2 valign="top" align="center">
			<p align=CENTER>
			<h4>CRÉDITOS</h4></p>
		</td>
		<td ROWSPAN=2 valign="top" align="center">
			<p align=CENTER>
			<h4>CARÁCTER</h4></p>
		</td>
		<td colspan=4 valign="top" align="center">
			<p align=CENTER>
			<h4>HORAS*</h4></p>
		</td>
	</tr>
	<tr>
		<td colspan=2 valign="top" align="center">
			<p align=CENTER>
			<h4>HT</h4></p>
		</td>
		<td valign="top" align="center">
			<p align=CENTER>
			<h4>HL</h4></p>
		</td>
		<td valign="top" align="center">
			<p align=CENTER>
			<h4>HP</h4></p>
		</td>
	</tr>
	<tr>
		<td>
			<p align=CENTER><font class="font">{{$item->matters->semester}}</font></p>
		</td>
		<td>
			<p align=CENTER><font class="font">{{$item->matters->slug}}</font>
			</p>
		</td>
		<td colspan=2>
			<p align=CENTER>
			<font class="font">{{$item->matters->credit}}</font></p>
		</td>
		<td>
			<p align=CENTER>
			<span><font>OBLIGATORIO</font></span></p>
		</td>
		<td colspan=2>
			<p align=CENTER>
			<font class="font">{{$item->matters->ht}}</font></p>
		</td>
		<td>
			<p align=CENTER>
			<font class="font">{{$item->matters->hl}}</font></font></p>
		</td>
		<td>
			<p align=CENTER>
			<font class="font">{{$item->matters->hp}}</font></font></p>
		</td>
	</tr>
	<tr>
		<td colspan=3>
			<p align=LEFT>
			<h4>DIRECCIÓN</h4></p>
		</td>
		<td colspan=6>
			<p align=LEFT>
			<h4>DEPARTAMENTO</h4></p>
		</td>
	</tr>
	<tr>
		<td colspan=3>
			<p align=CENTER>
			<font class="font">{{$item->matters->career->area->area}}</font></p>
		</td>
		<td colspan=6>
			<p align=CENTER>
			<span><font><span><font class="font">{{$item->matters->career->area->departamento?'me falta campo':'me falta campo'}}</font></p>
		</td>
	</tr>
	<tr>
		<td colspan=6>
			<p align=CENTER>
			<h4>AUTORES</h4></p>
		</td>
		<td colspan=3>
			<p align=CENTER>
			<h4>VERSIÓN</h4></p>
		</td>
	</tr>
	<tr>
		<td colspan=6 HEIGHT=10>
			<UL>
				@foreach($item->matters->matter_user as $items)
				<LI><p align=LEFT style="margin-bottom: 0in;">
					{{$items->teacher->user->name}}.
					{{$items->teacher->user->lastname}}
				</p>
				@endforeach
			</UL>
		</td>
		<td colspan=3>
			<p align=CENTER>
			<span><font class="font">{{$item->version}}</font></span></p>
		</td>
	</tr>

	@for($i=0;$i < count($contenidos_paginados);$i++)
		@if($key==$i)
		<tr>
			<td colspan=9 Valign=TOP>
				<p align=LEFT>
				<h4>JUSTIFICACIÓN</h4></p>
			</td>
		</tr>
		<tr>
			<td colspan=9 Valign=TOP >
			{{-- prototipo  --}}
			<div style="width: 100%; padding: 4px;margin:1px">
				<p align=JUSTIFY style="display: inline-block;text-indent: 5px;text-align: justify;"><font class="font">
						{!!  $contenidos_paginados[$i]['justification']  !!}
				</font></font></p>
			</div></td>
		</tr>
		@endif
	@endfor
	@for($i=0;$i < count($contenidos_paginados);$i++)
		@if($key==$i)
		<tr>
			<td colspan=9 Valign=TOP>
				<p align=LEFT>
				<h4>PROPÓSITOS</h4></p>
			</td>
		</tr>
		<tr>
			<td colspan=9 Valign=TOP>
				<p align=JUSTIFY><font class="font">{!!$contenidos_paginados[$i]['purpose']!!} </font></font></p>
			</td>
		</tr>
		@endif
	@endfor
	@for($i=0;$i < count($contenidos_paginados);$i++)
		@if($key==$i)
		<tr>
			<td colspan=9 Valign=TOP>
				<p align=LEFT>
				<h4>CONTENIDO
				PROGRAMÁTICO</h4></p>
			</td>
		</tr>
		<tr>
			<td colspan=9 Valign=TOP>
			 <p align=JUSTIFY><font class="font">{!!$contenidos_paginados[$i]['content']!!}</font></font></p>
			</td>
		</tr>
		@endif
	@endfor


	<tr Valign=TOP>
		<td colspan=4 >
			<p align=LEFT>
			<h4>ESTRATEGIAS
			METODOLÓGICAS</h4></p>
		</td>
		<td colspan=5 >
			<p align=LEFT>
			<h4>ESTRATEGIAS
			DE EVALUACIÓN</h4></p>
		</td>
	</tr>
	<tr Valign=TOP>
		<td colspan=4 ><p align=JUSTIFY><font class="font">{{$item->methodology}}</font></font></p>
		</td>
		<td colspan=5 ><p align=JUSTIFY><font class="font">{{$item->evaluation}}</font></font></p>
		</td>
	</tr>
</table>
@endforeach

@endsection