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
		table {
			width: 80% !important;
			margin-left: 1cm !important;
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

		

	@page {
        margin: 0cm .5cm;
        font-family: Arial;
    }
    html{
    	
    }
    body {
        margin: 2cm 3cm 2cm 1cm;
    }

    header {
		font: 25px monospace !important;
        position: fixed;
        top: .6cm;
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
		font: 21px monospace !important;
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
		min-width: 155% !important;
		max-width: 155% !important;
		height: 60% !important;
		max-width: 155% !important;	
		margin-left: 2cm !important;
		margin-right: 6cm !important;
		margin-top: 1cm !important;
		margin-bottom: .5cm !important;
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
	}pre{
		word-break: keep-all !important;
		background: transparent;
		color:#000000 !important;
		text-align: left !important;
		font: 20px monospace !important;
	}
	.font{
		word-break: break-all !important;
		background: transparent;
		color:#000000 !important;
		text-align: left !important;
		font: 20px monospace !important;
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
	  .paginar {
	    	page-break-before: always;
	  }
	}

	.nueva-pagina {
		margin-top: 8cm !important;
		position: absolute !important;
	}
	</style>
	@yield('style_inline')
</head>
<body>
	@yield('content')
</body>
</html>