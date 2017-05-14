<?php
//Funciones Luciana:

function get_error_css_class($error) {
	if ($error){
		return 'has-error';
	} else {
		return 'has-success';
	}
}


function validate_user_login (array $data) {
	$errors = array();

	if (empty($data['email'])) {
		$errors['email'] = "Ingrese su e-mail";
	} else {
		$user = get_user_by_email($data['email']);
		if ($user == False) {
			$errors['email'] = "El e-mail ingresado es incorrecto";
		} elseif (empty($data['password'])) {
			$errors['password'] = "Ingrese su contraseña";
		} elseif (!password_verify($data['password'], $user['password'])) {
			$errors['password'] = "La contraseña es incorrecta";
		}
	}	
	
	return $errors;
}


function login_user (array $data) {
	$_SESSION['user'] = get_user_by_email($data['email']);
}

function logout_user () {
	session_destroy();
}

function is_logged_in () {
	return (!empty($_SESSION['user']));
}

function get_users() {
	$txt = file_get_contents('usuarios.json');
	$json_list = explode(PHP_EOL, $txt);
	$users = array_map(function($json) {
		return json_decode($json, true);
	}, $json_list);
	return $users;
}

function get_user_by_email($email) {
	foreach (get_users() as $user) {
		if($user['email'] == $email) {
			return $user;
		}
	}
	return False;
}

//cookie para que recuerde el email si el usuario tilda "recordarme"
function remember_login_email($email) {
	$expires = time() + 60*60*24*7; // 7 días
	setcookie('login_email', $email, $expires);
}

function get_remembered_login_email() {
	if(isset($_COOKIE['login_email'])) {
		return $_COOKIE['login_email'];
	} 
	return '';
}


// Funciones Tami:

function validarUsuario($miUsuario)
	{
		$errores = [];

		if (trim($miUsuario["inputName"]) == "")
		{
			$errores['name'] = "Falta el Nombre";
		}
		if (trim($miUsuario["inputApellido"]) == "")
		{
			$errores['surname'] = "Falta el Apellido";
		}
		if (trim($miUsuario["inputPassword"]) == "")
		{
			$errores['password'] = "Falta la Password";
		}
		if (trim($miUsuario["inputPassword2"]) == "")
		{
			$errores['password2'] = "Falta repetir contraseña";
		}
		if ($miUsuario["inputPassword"] != $miUsuario["inputPassword2"])
		{
			$errores['repeat-password'] = "Las contraseñas son distintas";
		}
		if ($miUsuario["inputEmail"] == "")
		{
			$errores['email'] = "Falta el e-mail";
		}
		if (!filter_var($miUsuario["inputEmail"], FILTER_VALIDATE_EMAIL))
		{
			$errores['email-erroneo'] = "El e-mail tiene forma fea";
		}
		if (existeElMail($miUsuario["inputEmail"]))
		{
			$errores['user'] = "Usuario ya registrado";
		}
		return $errores;
	}

	function existeElMail($mail)
	{
		return get_user_by_email($mail);
	}

	function guardarUsuario($miUsuario) 
	{
		$usuarioJSON = json_encode($miUsuario);

		file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
	}

	function crearUsuario($miUsuario)
	{
		$usuario = [
			"nombre" => $miUsuario["inputName"],
			"apellido" => $miUsuario["inputApellido"],
			"email" => $miUsuario["inputEmail"],
			"password" => password_hash($miUsuario["inputPassword"], PASSWORD_DEFAULT),
			"inputEquipo" => $miUsuario["inputEquipo"],
			"id" => traerNuevoId()
		];

		return $usuario;
	}

	function traerNuevoId()
	{
		$usuarios = get_users();

		//Para quitar el último ENTER
		array_pop($usuarios);

		if (count($usuarios) == 0) {
			return 1;
		}

		$ultimoUsuario = $usuarios[count($usuarios) - 1];

		return $ultimoUsuario["id"] + 1;
	}

	function enviarAFelicidad()
	{
		header("location:felicidad.php");exit;
	}


?>