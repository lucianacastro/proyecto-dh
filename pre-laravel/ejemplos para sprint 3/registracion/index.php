<html>
<head>
</head>
<body>
<?php
require 'clsValidacion.php';
require 'clsUsuario.php';

if($_POST) {

	$validar = new Validacion();

	//validamos

	$errores = array();

	if(!$validar->validarEmail($_POST['email'])) {
		$errores[] = 'El email no es valido';
	}

	if(!$validar->validarPassword($_POST['password'])) {
		$errores[] = 'El password no es valido';
	}

	if(!$validar->validarUsuario($_POST['usuario'])) {
		$errores[] = 'El usuario no es valido';
	}

	if(empty($errores)) {
		
		$db = new PDO('mysql:host=localhost;dbname=registro',
						'usuario', 
						'1234');

		$usuario = new Usuario($db);

		$idusuario = $usuario->registrarUsuario($_POST);

		echo "el id es " . $idusuario;

		die('registramos');
	}

}
?>

<div style="color:red">
<?php
if(!empty($_POST)) {
foreach($errores as $e) {
	echo $e . "<br>";
}
}
?>
</div>

<form method="post">

<label>Usuario:</label>
<input type="text" name="usuario">
<br>

<label>Email:</label>
<input type="text" name="email">
<br>

<label>Password:</label>
<input type="text" name="password">
<br>

<input type="submit" name="enviar" value="enviar">

</form>
</body>
</html>