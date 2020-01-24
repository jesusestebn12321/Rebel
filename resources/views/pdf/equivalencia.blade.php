@extends('pdf.layouts.app')
@section('title','Equivalencia')
@section('style_inline')
<style type="text/css">

	@page {
        margin: 0cm .5cm;
        font-family: Arial;
    }
    html{
    	
    }
    body {
        margin: 3cm 2cm 3cm;
    }

    header {
		font: 25px monospace !important;
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: auto;
        line-height: 30px;
		margin-bottom: 15px !important;

    }
    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        line-height: 35px;
		font:15px monospace !important;
    }

	th, td{
		border:2px solid black !important;
	}
	.p{
		font: 19px monospace !important;
    	background: #ffffff;
    	border: none; padding: 0in;
    	page-break-inside: auto;
    	widows: 0;
    	orphans: 0;
		background: transparent;
    	page-break-after: auto;
		text-transform: uppercase;
 
    }.table {
		width: 155% !important;
		height: 60% !important;
		margin-left: 2cm !important;
		margin-right: 6cm !important;
		margin-top: 1cm !important;
		margin-bottom: 1cm !important;
		min-width: 100% !important;
		min-height: 5% !important;
		position: all ;
	}
	.td,.th{
		border:  1px solid black !important;
		outline: 1px solid black !important;
		width:.5cm !important;
		height:.4cm !important;
		min-height: 10px !important;
		padding: 1px;
		margin:1px;
		background: #ffffff !important;
	}h4{
		text-transform: uppercase;
		font: 21px monospace !important;
		font-weight: bold;
	}h3{
		text-transform: uppercase;
		font: 19px monospace !important;
		font-weight: bold;
	}
	.font{
		word-break: break-all !important;
		background: transparent;
		color:#000000 !important;
		text-align: left !important;
		font: 17px monospace !important;
		padding: 10px;
	}
	span{
		color:#000000 !important;
		background: #ffffff !important;
		font-variant: normal;
		text-decoration: none;
		font-style: normal

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
@include('pdf.layouts.header')
<main style="margin-bottom: 1px;height: auto;">

@foreach($contents as $key=>$item)
@if($key!=0)
<!--p style="margin-bottom: 100px;height: 20%;background: red "></p-->	
@endif
<table class="table" cellpadding="7" cellspacing="0" style="margin-top: 3cm !important">
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<col >
	<thead>
		<tr>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>PROGRAMA</h3>
				</p>
			</th>
		</tr>
		
	</thead>
	<tbody>
		<tr>
			<td class="td" colspan=9 Valign=TOP>
				<p align=CENTER>
					<span>
					<font class="font">{!!$item->matters->career->career!!}</span></font>
				</p>
			</td>
		</tr>
	</tbody>
	<thead>
		<tr>
			<th class='th' colspan=9 Valign=TOP align="left">
				<p align=JUSTIFY>
					<h4>UNIDAD CURRICULAR</h4>
				</p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
				<font class="font">{!! $item->matters->matter !!}</font></font></p>
			</td>
		</tr>
	</tbody>
	<thead>
		<tr>
			<th class='th' height="1" style="padding: 0px" ROWSPAN=2 valign="top" align="center">
				<p align=CENTER>
				<h4>SEMESTRE</h4></p>
			</th>
			<th class='th' height="1" style="padding: 0px" ROWSPAN=2 valign="top" align="center">
				<p align=CENTER>
				<h4>CÓDIGO</h4></p>
			</th>
			<th class='th' height="1" style="padding: 0px" ROWSPAN=2 colspan=2 valign="top" align="center">
				<p align=CENTER>
				<h4>CRÉDITOS</h4></p>
			</th>
			<th class='th' height="1" style="padding: 0px" ROWSPAN=2 valign="top" align="center">
				<p align=CENTER>
				<h4>CARÁCTER</h4></p>
			</th>
			<th class='th' height="1" style="padding: 0px" colspan=4 valign="top" align="center">
				<p align=CENTER>
				<h4>HORAS*</h4></p>
			</th>
		</tr>
		<tr>
			<th class='th' height="1" style="padding: 0px" colspan=2 valign="top" align="center">
				<p align=CENTER>
				<h4>HT</h4></p>
			</th>
			<th class='th' height="1" style="padding: 0px" valign="top" align="center">
				<p align=CENTER>
				<h4>HL</h4></p>
			</th>
			<th class='th' height="1" style="padding: 0px" valign="top" align="center">
				<p align=CENTER>
				<h4>HP</h4></p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<p align=CENTER><font class="font">{!!$item->matters->semester!!}</font></p>
			</td>
			<td>
				<p align=CENTER><font class="font">{!!$item->matters->slug!!}</font>
				</p>
			</td>
			<td class="td" colspan=2>
				<p align=CENTER>
				<font class="font">{!!$item->matters->credit!!}</font></p>
			</td>
			<td>
				<p align=CENTER>
				<span><font class="font">OBLIGATORIO</font></span></p>
			</td>
			<td class="td" colspan=2>
				<p align=CENTER>
				<font class="font">{!!$item->matters->ht!!}</font></p>
			</td>
			<td>
				<p align=CENTER>
				<font class="font">{!!$item->matters->hl!!}</font></font></p>
			</td>
			<td>
				<p align=CENTER>
				<font class="font">{!!$item->matters->hp!!}</font></font></p>
			</td>
		</tr>
	</tbody>
	<thead>	
		<tr>
			<th class='th' colspan=9>
				<p align=LEFT>
				<h4>DIRECCIÓN</h4></p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="td" colspan="9">
				<p align=CENTER>
				<font class="font">{!!$item->matters->career->area->area!!}</font></p>
			</td>
		</tr>
	</tbody>
	<thead>
		<tr>
			<th class='th' colspan=6>
				<p align=CENTER>
				<h4>AUTORES</h4></p>
			</th>
			<th class='th' colspan=3>
				<p align=CENTER>
				<h4>VERSIÓN</h4></p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="td" colspan=6>
				<ul>
					@foreach($item->matters->matter_user as $items)
					<li><p class="font" align=LEFT style="margin-bottom: 0in;">
						{!!$items->teacher->user->name!!}.
						{!!$items->teacher->user->lastname!!}
					</p></li>
					@endforeach
				</ul>
			</td>
			<td class="td" colspan=3>
				<p align=CENTER>
				<span><font class="font">{!!$item->version!!}</font></span></p>
			</td>
		</tr>
	</tbody>

	@for($i=0;$i < count($contenidos_paginados);$i++)
		@if($key==$i)
		<thead>
			<tr>
				<th class='th' colspan=9 Valign=TOP>
					<p align=LEFT>
					<h4>JUSTIFICACIÓN</h4></p>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="td" colspan=9 Valign=TOP >
				<div style="width: 100%; padding: 4px;margin:1px">
					<p align=JUSTIFY style="display: inline-block;text-indent: 5px;text-align: justify;"><font class="font">
							{!!  $contenidos_paginados[$i]['justification']  !!}
					</font></font></p>
				</div></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th class='th' colspan=9 Valign=TOP>
					<p align=LEFT>
					<h4>PROPÓSITOS</h4></p>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="td" colspan=9 Valign=TOP>
					<p align=JUSTIFY><font class="font">{!!$contenidos_paginados[$i]['purpose']!!} </font></font></p>
				</td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<td class="td" colspan=9 Valign=TOP>
					<p align=LEFT>
					<h4>CONTENIDO PROGRAMÁTICO</h4></p>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="td" colspan=9 Valign=TOP>
				 <p align=JUSTIFY><font class="font">{!!$contenidos_paginados[$i]['content']!!}</font></font></p>
				</td>
			</tr>
		</tbody>
		@endif
	@endfor
	<thead>
		<tr Valign=TOP>
			<th class='th' colspan=4>
				<p align=LEFT>
				<h4>ESTRATEGIAS
				METODOLÓGICAS</h4></p>
			</th>
			<th class='th' colspan=5 >
				<p align=LEFT>
				<h4>ESTRATEGIAS
				DE EVALUACIÓN</h4></p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr Valign=TOP>
			<td class="td" colspan=4 ><p align=JUSTIFY><font class="font">{!!$item->methodology!!}</font></font></p>
			</td>
			<td class="td" colspan=5 ><p align=JUSTIFY><font class="font">{!!$item->evaluation!!}</font></font></p>
			</td>
		</tr>
	</tbody>
</table>
<footer>
	<p style="text-align: right;color: black;margin-right: 1cm;margin-top: 1cm">Pagina {{$key+1}}</p>
</footer>
@endforeach
</main>
@endsection