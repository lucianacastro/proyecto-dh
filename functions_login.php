<?php
include_once "init.php";

function get_error_css_class($error) {
	if ($error){
		return 'has-error';
	} else {
		return 'has-success';
	}
}


//referenciar a info guardada en el json y borrar variables user1
function validate_user_login (array $data) {

	$errors = array();
	$email_user1 = "lucianaycastro@gmail.com";
	$password_user1 = "12345";

	if (empty($data['email'])) {
		$errors['email'] = "Ingrese su e-mail";
	} elseif ($data['email'] != $email_user1) {
		$errors['email'] = "El e-mail ingresado es incorrecto";
	}

	if (empty($data['password'])) {
		$errors['password'] = "Ingrese su contraseña";
	} elseif ($data['password'] != $password_user1) {
		$errors['repeat-password'] = "La contraseña es incorrecta";
	}

	
	return $errors;
}


function login_user (array $data) {
	$_SESSION['user'] = $data;

}

function logout_user () {
	session_destroy();
}

function is_logged_in () {
	return (!empty($_SESSION['user']));
}



?>