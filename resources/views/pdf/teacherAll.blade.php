@extends('pdf.layouts.app')
@section('content')
@include('pdf.layouts.header')
<style type="text/css">
	@media print {
		.page-break {
			page-break-after: always;
		}
	}
</style>

@foreach($teacher as $key=>$item)
@if($key==0)
<table class="page-break table" cellpadding="7" cellspacing="0" style="margin-top: 2cm !important">
	<col>
	<col>
	<col>
	<col>
	<col>
	<thead>
		<tr>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>ID</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Nombre</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Apellido</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Cedula</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>E-mail</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Cargo</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Creada</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Ultimo Inicio de sección</h3>
				</p>
			</th>
		</tr>
	</thead>
	<tbody>
		@endif
		@for($i=0;count($corte)>$i;$i++)
		@if($corte[$i]['id']==$key)
		{!! $corte[$i]['html']   !!}
		@endif
		@endfor

		<tr>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->id }}</font>
				</p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->user->name }}</font>
				</p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->user->lastname }}</font>
				</p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->user->dni }}</font>
				</p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->user->email }}</font>
				</p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->hasRole(5)?'Coordinador':'Academico' }}</font>
				</p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->created_at }}</font>
				</p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
					<font class="font">{{ $item->user->last_login }}</font>
				</p>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<footer>
	<p style="text-align: center;color: black;margin-right: 1cm;margin-top: 1cm">{!! $script !!}</p>
</footer>
@endsection