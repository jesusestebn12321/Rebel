<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
	<title>@yield('title')</title>
	<meta name="generator" content="LibreOffice 5.4.0.3 (Linux)">
	<meta name="created" content="2019-08-07T20:14:11">
	<meta name="changed" content="2019-08-07T20:14:11">
	<meta name="AppVersion" content="12.0000">
	<meta name="DocSecurity" content="0">
	<meta name="HyperlinksChanged" content="false">
	<meta name="LinksUpToDate" content="false">
	<meta name="ScaleCrop" content="false">
	<meta name="ShareDoc" content="false">
	@yield('style')
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Times New Roman"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		.comment{ display:none;  }
		table {
			width: 80% !important;
			margin-left: 2.5cm !important;
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
	@yield('style_inline')
</head>
<body>
	@yield('content')
</body>
</html>