<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
</head>
<body>
	<header style="background: #5e72e4;padding:30px;border-top-left-radius:20px;border-top-right-radius:20px ">
		<h1 style="text-align:center;color:white">Bienvenido/a a nuestro sistema de Equivalencias de nuetra <b>Universidad Nacional Experimental Romulo Gallegos.</b></h1>
	</header>
	<main style="background:#ccc;padding:10px">
		<h2 style="padding:10px;text-align:center;color:white">Por favor confirma tu correo electrónico.</h2>
		<h3 style="padding:10px;text-align: center;color:white">{{ $rol==1?  'Profesor':'Estudiante' }} {{ $name }} {{ $lastname }}, gracias por registrarte en nuestro<strong>sistema</strong>!</h3>
		<p style="text-align: center;padding:10px;color:white" >Para ello simplemente debes hacer click en el siguiente enlace:</p>
		<p style="text-align:center;padding:10px">
			<a style="padding:20px;text-decoration: none;width:10px;height:100%;background:#2dce89;color:#fff;border-radius:20px;"  href="{{ url('/register/verify/' . $confirmation_code) }}">
				Click para confirmar tu email.
			</a>	
		</p>
	</main>
	<footer style="padding: 20px;color:white;background:#11cdef;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px">
        &copy; {{now()}} <a href="#!" class="font-weight-bold ml-1" target="_blank"></a>
	</footer>
</body>
</html>