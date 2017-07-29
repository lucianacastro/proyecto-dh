<html>
<head>
</head>
<body>
<?php
session_start();

require 'clsValidacion.php';
require 'clsUsuario.php';

if($_SESSION) {

	print_r($_SESSION);

}else{
	header('location: login.php');

}
?>
Te has logeado

<a href="salir.php">Cerrar Session</a>
</body>
</html>