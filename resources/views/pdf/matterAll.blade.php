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


<table cellspacing="0" border="0">
	<colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="40"></colgroup><colgroup width="315"></colgroup><colgroup width="136"></colgroup>
	<thead>
		<tr>
			
			<th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">ID</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Codigo</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Areas</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Carrera</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Modalidad</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Unidad Curricular</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Titulo del contenido en vigencia</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Creada</font></b></th>
	        <th style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">Editada</font></b></th>
		</tr>
	</thead>
	<tbody>
	@foreach($matter as $item)
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->id }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->slug }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->career->area->area }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->career->career }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->career->modalidad }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->matter }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">
		 @foreach($item->content as $contenidos)
		 	{{$contenidos->confirmation?$contenidos->title:''}}
		 @endforeach
		</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->created_at }}</font></b>
		</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="center"><b><font face="Tahoma" size="1">{{ $item->updated_at }}</font></b>
		</td>
	</tr>
	@endforeach
	</tbody>
</table>
<footer>
	<p style="text-align: center;color: black;margin-right: 1cm;margin-top: 1cm">{!! $script !!}</p>
</footer>
@endsection