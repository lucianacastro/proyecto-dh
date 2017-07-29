<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SessionHelper;
use DB;
use FormRegister;

//require_once('classes/FormRegister.class.php');

class RegisterController extends Controller
{
    //
    public function showForm(Request $request) {

    	$session = SessionHelper::getInstance();
		$db = DB::getInstance();


		//esto es para que si está logeado no pueda acceder al form de register
		if($session->isLoggedIn()) {
			header("Location: success.php");
			exit();
		}

		$errors = [];

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
				header('location: /happiness');
				exit;
			}
		} else {
			$formRegister = new FormRegister();
		}

		return view('register', ['formRegister' => $formRegister, 'session' => $session, 'errors' => $errors]);
	}

}