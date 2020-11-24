<html>
<html lang="es">
<head>
<meta charset="utf-8">
</head>
<body>
<h2>Hola {{$usuario->Nombre}} bienvenido a Mundo programming</h2>
<p>Por favor confirma tu correo electronico {{$usuario->Correo}} para continuar con el proceso</p>
<p>Para ello solamente debes de hacer click en el siguiente enlace:</p>
<a href="http://127.0.0.1:8000/api/Verificacion/{{$usuario->id}}"> 
Clic aqui para confirmar tu correo electronico
 </a>
</body>
</html>