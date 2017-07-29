<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SessionHelper;
use DB;
use FormRegister;

class RegisterController extends Controller
{
    //
    public function showForm(Request $request) {

    	$session = SessionHelper::getInstance();
		$db = DB::getInstance();


		//esto es para que si está logeado no pueda acceder al form de register
		if($session->isLoggedIn()) {
			return redirect('/success');
		}

		$errors = [];

		if ($request->isMethod('post'))

			//Acá vengo si me enviaron el form
			$formRegister = new FormRegister(
				$request->input('name'),
				$request->input('lastname'),
				$request->input('email'),
				$request->input('password'),
				$request->input('repeatPassword'),
				$request->input('teamName')
			);
			
			//Validar
			$errors = $formRegister->validate();

			// Si no hay errors....
			if (empty($errors)) {
				$user = $formRegister->getRegistratingUser();

				// Guardar al usuario en DB
				$db->guardarUsuario($user);

				// Reenviarlo a la felicidad
				return redirect('/happiness');
			}
		} else {
			$formRegister = new FormRegister();
		}

		return view('register', ['formRegister' => $formRegister, 'session' => $session, 'errors' => $errors]);
	}

}