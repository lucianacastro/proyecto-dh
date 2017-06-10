<?php
include_once "init.php";
require_once('classes/FormLogin.class.php');
$body_class = 'body-login';

//esto es para que si está logeado no pueda acceder al form de login


if ($session->isLoggedIn()) {
	header("Location: success.php");
	exit();
}


if (!empty($_POST)) {
	$formLogin = new FormLogin($_POST['email'], $_POST['password']);
	$errors = $formLogin->validate();

	if (empty($errors)) {
		if (isset($_POST['remember_email'])) {
			$formLogin->rememberLoginEmail();
		}
		$user = $db->getUserByEmail($_POST['email']);
		$session->loginUser($user);
		header("Location: success.php");
		exit();
	}
} else {
	$formLogin = new FormLogin();
}

include "header.phtml";

include "login.phtml";

include "footer.phtml";

