<?php

require_once('DB.class.php');

class FormLogin {
	//atributos
	private $email;
	private $password;
	private $expires;

	public function __construct($email = '', $password = ''){
		$this->setEmail($email);
		$this->setPassword($password);
		$this->expires = time() + 60*60*24*7; // 7 días
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}


	public function validate() {
		$errors = array();

		if (empty($this->getEmail())) {
			$errors['email'] = "Ingrese su e-mail";
		} else {
			$db = DB::getInstance();
			$user = $db->getUserByEmail($this->getEmail());
			if ($user == False) {
				$errors['email'] = "El e-mail ingresado es incorrecto";
			} elseif (empty($this->getPassword())) {
				$errors['password'] = "Ingrese su contraseña";
			} elseif (!password_verify($this->getPassword(), $user->getPasswordHash())) {
				$errors['password'] = "La contraseña es incorrecta";
			}
		}	
		
		return $errors;
	}

	public function getErrorCssClass($error) {
		if ($error){
			return 'has-error';
		} else {
			return 'has-success';
		}
	}

	//cookie para que recuerde el email si el usuario tilda "recordarme"
	public function rememberLoginEmail() {
		setcookie('login_email', $this->getEmail(), $this->expires);
	}

	public function getRememberedLoginEmail() {
		if(isset($_COOKIE['login_email'])) {
			return $_COOKIE['login_email'];
		} 
		return '';
	}
}













