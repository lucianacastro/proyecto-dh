<?php

class Session {
	public function loginUser (User $user) {
		$_SESSION['user'] = $user;
	}

	public function logoutUser () {
		session_destroy();
	}


	public function isLoggedIn () {
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
}