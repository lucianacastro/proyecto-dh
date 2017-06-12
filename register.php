<?php

include_once "init.php";
require_once('classes/FormRegister.class.php');

//esto es para que si está logeado no pueda acceder al form de register
if($session->isLoggedIn()) {
	header("Location: success.php");
	exit();
}

if (!empty($_POST)) {

	//Acá vengo si me enviaron el form
	$formRegister = new FormRegister(
		$_POST['name'],
		$_POST['lastname'],
		$_POST['email'],
		$_POST['password'],
		$_POST['repeatPassword'],
		$_POST['teamName']
	);
	
	//Validar
	$errors = $formRegister->validate();

	// Si no hay errors....
	if (empty($errors)) {
		$user = $formRegister->getRegistratingUser();

		// Guardar al usuario en DB
		$db->guardarUsuario($user);

		// Reenviarlo a la felicidad
		enviarAFelicidad();
	}
} else {
	$formRegister = new FormRegister();
}


include('header.phtml');
include('register.phtml');
include('footer.phtml');