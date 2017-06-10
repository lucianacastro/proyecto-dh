<?php

require_once('User.class.php');
require_once('Singleton.trait.php');


class Session {
	use Singleton;

	public function loginUser(User $user) {
		$_SESSION['user'] = serialize($user);
	}

	public function logoutUser() {
		session_destroy();
	}

	public function isLoggedIn() {
		return (!empty($_SESSION['user']));
	}

	public function getUser() {
		if ($this->isLoggedIn()) {
			return unserialize($_SESSION['user']);
		}
		return False;
	}

}