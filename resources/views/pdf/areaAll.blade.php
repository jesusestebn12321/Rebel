@extends('pdf.layouts.app')
@section('title','Areas')
@section('content')
@include('pdf.layouts.header')
<style type="text/css">
	@media print {
		.page-break {
		    page-break-after: always;
		}
	}
</style>


@foreach($area as $key=>$item)


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
					<h3>Universidad</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Area</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Coordenadas</h3>
				</p>
			</th>
			<th class='th' colspan=9 Valign="center">
				<p align=center style="width: 10px">
					<h3>Creada</h3>
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
				<font class="font">{{ $item->id }}</font></font></p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
				<font class="font">{{ $item->university->university }}</font></font></p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
				<font class="font">{{ $item->area }}</font></font></p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
				<font class="font">{{ $item->address->addres }}</font></font></p>
			</td>
			<td class="td" colspan=9 Valign=TOP>
				<p align=center>
				<font class="font">{{ $item->created_at }}</font></font></p>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<script type="text/php">
    if ( isset($pdf) ) {
        // OLD 
        // $font = Font_Metrics::get_font("helvetica", "bold");
        // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
        // v.0.7.0 and greater
        $x = 72;
        $y = 810;
        $text = "Pagina {PAGE_NUM} de {PAGE_COUNT}";
        $font = $fontMetrics->get_font("monospace");
        $size = 10;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
@endsection