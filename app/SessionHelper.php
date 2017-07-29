<?php

class SessionHelper {

	use Singleton;

	public function loginUser(User $user) {
		Session::put('user', serialize($user));
		Session::save();
	}

	public function logoutUser() {
		Session::forget('user');
	}

	public function isLoggedIn() {
		return Session::has('user');
	}

	public function getUser() {
		if ($this->isLoggedIn()) {
			return unserialize(Session::get('user'));
		}
		return False;
	}

}