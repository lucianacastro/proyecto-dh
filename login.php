<?
include_once "init.php";


//esto es para que si está logeado no pueda acceder al form de login
if(is_logged_in()) {
	header("Location: success.php");
	exit();
}


if (!empty($_POST)) {

	$errors = validate_user_login($_POST);
	

	if (empty($errors)) {
		login_user($_POST);
		header("Location: success.php");
		exit();
	}
}

include "header.phtml";

include "login.phtml";

include "footer.phtml";

