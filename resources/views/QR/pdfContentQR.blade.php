@extends('QR.layouts.app')
@section('header')
	<div style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 20px; padding-left: 10px">
	<div style="float: right; position: relative !important">
		 <img style="padding: 0px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($urlConfir)) !!} ">
	</div> 
	<div style="width:60px;height:60px;display:inline-block;">
		<img style="width:10%;height:10%" src="{{asset('template/assets/img/brand/blue.png')}}" >
	</div>
	<div style="display:inline-block; margin-left: 10px;padding-bottom:10px;padding-top:10px;margin-top:-10px;top:-10px;position:relative">
		<div>
			<b>{{$university->university}}</b>
		</div>
		<div>
			<b>{{Auth::user()->matter_user[0]->matter->career->area->area}}</b>
		</div>
		<div>
			<b>Periodo estudiantil:</b>{{$download->start_student}}-{{$download->last_student}}
		</div>
		<div>
			<b>Status del estudiante</b>{{$download->start_student}}-{{$download->last_student}}
		</div>
	</div>
	<center>
		<h2 class="titulo-header-reporte">sadasdasd</h2>
	</center>
</div>
@endsection
@section('content')
<table cellspacing="0" border="0">
	<colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="315"></colgroup><colgroup width="136"></colgroup>
	<thead>
		<tr>
			
			<th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">ID</font></b></th>
	        
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Materia</font></b></th>
	        
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Contenido</font></b></th>
	        
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Created_at</font></b></th>
	        
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Updated_at</font></b></th>
		</tr>
	</thead>
	<tbody>
	@foreach($matter_user as $item)
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->id }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->matter->matter }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">
		@forelse($item->matter->content as $content)
			
			{{ $content }}
		@empty
			no hay un contenido verificado para esta materia 
		@endforelse

		</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item }}</font></b>
		</td>
	</tr>
	@endforeach
	</tbody>
	<!--tfoot><tr><td></td></tr></tfoot -->
</table>
@endsection