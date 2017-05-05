<?

require_once("functions.php");


if (!empty($_POST)) {

	$errors = validate_user($_POST);
	

	if (empty($errors)) {
		save_user($_POST);
		header("Location: success.php");
		exit();
	}
}


include("register.phtml");