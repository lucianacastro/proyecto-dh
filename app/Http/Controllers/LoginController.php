<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SessionHelper;
use DB;
use FormLogin;

class LoginController extends Controller
{
    //
    public function showForm(Request $request) {

    	$session = SessionHelper::getInstance();
		$db = DB::getInstance();

		// esto es para que si está logeado no pueda acceder al form de login
		if ($session->isLoggedIn()) {
			header("Location: /success");
			exit();
		}

		$errors = [];

		if ($request->isMethod('post'))
		{
			$formLogin = new FormLogin($request->input('email'), $request->input('password'));
			$errors = $formLogin->validate();

			if (empty($errors)) {
				if ($request->input('remember_email')) {
					$formLogin->rememberLoginEmail();
				}
				$user = $db->getUserByEmail($_POST['email']);
				$session->loginUser($user);
				header("Location: /success");
				exit();
			}
		} else {
			$formLogin = new FormLogin();
		}

		//  FIXME errors es una variable reservada, aparentemente
		return view('home', ['formLogin' => $formLogin, 'body_class' => 'body-login', 'session' => $session, 'errors' => $errors]);
	}

	public function logout(Request $request) {
		$session = SessionHelper::getInstance();
		$session->logoutUser();
	}
}
