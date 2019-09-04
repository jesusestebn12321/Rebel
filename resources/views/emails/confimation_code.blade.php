<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h1>Bienvenido/a a nuestro sistema de Equivalencias de nuetra <b>universidad nacional experimental romulo gallegos.</b></h1>
	<p>Por favor confirma tu correo electrónico.</p>
	<h2>{{ $rol==1?  'Profesor':'Estudiante' }} {{ $name }} {{ $lastname }}, gracias por registrarte en nuestro<strong>sistema</strong>!</h2>
	<p>Cedula: {{ $dni }}</p>
	<p>Para ello simplemente debes hacer click en el siguiente enlace:</p>
	<a style="padding:10px;width:10px;height:100%;background:#5e72e4;color:#fff;border-radius:20px;" href="{{ url('/register/verify/' . $confirmation_code) }}">
		Clic para confirmar tu email
	</a>
</body>
</html>