<?php
//Funciones Luciana:
// class formLogin
function get_error_css_class($error) {

}


function validate_user_login (array $data) {
		
	}

//armar class session
function login_user (array $data) {
	$_SESSION['user'] = get_user_by_email($data['email']);
}

function logout_user () {
	session_destroy();
}


function is_logged_in () {
	return (!empty($_SESSION['user']));
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






//class db
function get_users() {

}
function get_user_by_email($email) {
}


	function existeElMail($mail)
	{
	}

	function guardarUsuario($miUsuario) 
	{
	
	}

function traerNuevoId()
	{

	}



function save_image() {
	if ($_FILES["profilePic"]["error"] == UPLOAD_ERR_OK) {
		$name=$_FILES["profilePic"]["name"]; 
		$file=$_FILES["profilePic"]["tmp_name"];
		$ext = pathinfo($name, PATHINFO_EXTENSION); $myFile = dirname(__FILE__);
		$myFile = $myFile . "/img/";
		$myFile = $myFile . "newImage." . $ext;
		move_uploaded_file($file, $$myFile); 
	}	
} 


// Funciones Tami:

//ex validarUsuario
	public function validate() {
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


//user constructor
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

	

	function enviarAFelicidad()
	{
		header("location:felicidad.php");exit;
	}


?>