
@extends('pdf.layouts.app')
@section('title',$matter_user->matter->matter)
@section('content')
@include('pdf.layouts.header')
<table class="table" cellpadding="7" cellspacing="0" style="margin-top: 3cm !important">
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
					<h4>PROGRAMA</h4>
				</p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="td" colspan=9 Valign=TOP>
				<p align=CENTER>
					<span>
					<font class="font">{!!$matter_user->matter->career->career!!}</span></font>
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
				<font class="font">{!!$matter_user->matter->matter!!}</font>
				</p>
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
				<p align=CENTER><font class="font">{!!$matter_user->matter->semester!!}</font>
				</p>
			</td>
			<td>
				<p align=CENTER><font class="font">{!!$matter_user->matter->slug!!}</font>
				</p>
			</td>
			<td class="td" colspan=2>
				<p align=CENTER>
				<font class="font">{!!$matter_user->matter->credit!!}</font>
				</p>
			</td>
			<td>
				<p align=CENTER>
				<span><font class="font">OBLIGATORIO</font></span></p>
			</td>
			<td class="td" colspan=2>
				<p align=CENTER>
				<font class="font">{!!$matter_user->matter->ht!!}</font>
				</p>
			</td>
			<td>
				<p align=CENTER>
				<font class="font">{!!$matter_user->matter->hl!!}</font>
				</p>
			</td>
			<td>
				<p align=CENTER>
				<font class="font">{!!$matter_user->matter->hp!!}</font>
				</p>
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
				<font class="font">{!!$matter_user->matter->career->area->area!!}</font>
				</p>
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
					@foreach($matter_user->matter->matter_user as $items)
					<li><p class="font" align=LEFT style="margin-bottom: 0in;">
						{!!$items->teacher->user->name!!}.
						{!!$items->teacher->user->lastname!!}
					</p></li>
					@endforeach
				</ul>
			</td>
			<td class="td" colspan=3>
				<p align=CENTER>
				<span><pre>{!! $content->version !!}</pre></span></p>
			</td>
		</tr>
	</tbody>

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
					<p align=JUSTIFY style="display: inline-block;text-indent: 5px;text-align: justify;"><pre>{!!$content->justification!!}
					</pre>
					</p>
				</div>
				</td>
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
				<div style="width: 100%; padding: 4px;margin:1px">
					<p align=JUSTIFY style="display: inline-block;text-indent: 5px;text-align: justify;"><pre>{!!$content->purpose!!}</pre>
					</p>
				</div>
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
				<div style="width: 100%; padding: 4px;margin:1px">
				 <p align=JUSTIFY style="display: inline-block;text-indent: 5px;text-align: justify;"><pre>{!!$content->content!!}</pre>
				 </p>
				</td>
				</div>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table class="table" style="height:auto !important;margin-top: 3cm !important">
	<col >
	<col >
	<thead>
		<tr Valign=TOP>
			<th class='th' colspan=4>
				<p align=LEFT>
				<h4>ESTRATEGIAS
				METODOLÓGICAS</h4></p>
			</th>
			<th class='th' colspan=5>
				<p align=LEFT>
				<h4>ESTRATEGIAS
				DE EVALUACIÓN</h4></p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr Valign=TOP>
			<td class="td" style="color:black !important" colspan=4 >
				<div style="width: 100%; padding: 4px;margin:1px">
					<p align=JUSTIFY><pre>{!!$content->methodology!!}</pre>
					
					</p>
				</div>
			</td>
			<td class="td" colspan=5 >
				<div style="width: 100%; padding: 4px;margin:1px">
					<p align=JUSTIFY><pre>{!!$content->evaluation!!}</pre>
					</p>
				</div>
			</td>
		</tr>
	</tbody>
</table>
<footer>
	<p style="text-align: right;color: black;margin-right: 1cm;margin-top: 1cm">{!! $script !!}</p>
</footer>
@endsection