<?php

class FormRegister {
	//atributos
	
	private $name;
	private $lastname;
	private $email;
	private $password;
	private $repeatPassword;
	private $teamName;	
	private $teamNames = [
		'Club Atlético Boca Junior',
		'Club Atlético Independiente',
		'Club Atlético River Plate',
		'Racing Club',
		'Club Atlético San Lorenzo de Almagro',
		'Club Atlético Huracán',
		'Club Atlético Banfield',
		'Club Atlético Belgrano',
		'Club Atlético Newell\'s Old Boys',
		'Club Ferro Carril Oeste',
		'Tigre'
	];

	public function __construct($name = '', $lastname = '', $email = '', $password = '', $repeatPassword = '', $teamName = '') {
		$this->setName($name);
		$this->setLastname($lastname);
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setRepeatPassword($repeatPassword);
		$this->setTeamName($teamName);
	}

	public function getName() {
		return $this->name;
	} 

	public function getLastname() {
		return $this->lastname;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getRepeatPassword() {
		return $this->repeatPassword;
	}

	public function getTeamName() {
		return $this->teamName;
	}


	public function setName($name) {
		$this->name = $name;
	}

	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setRepeatPassword($repeatPassword) {
		$this->repeatPassword = $repeatPassword;
	}

	public function setTeamName($teamName) {
		$this->teamName = $teamName;
	}

	public function getTeamNames() {
		asort($this->teamNames);
		return $this->teamNames;
	}

	public function validate() {
		$errors = [];

		if (trim($this->getName()) == '') {
			$errors['name'] = 'Falta el Nombre';
		}
		if (trim($this->getLastname()) == '') {
			$errors['lastname'] = 'Falta el Apellido';
		}
		if (trim($this->getPassword()) == '') {
			$errors['password'] = 'Falta la Password';
		}
		if (trim($this->getRepeatPassword()) == '') {
			$errors['repeatPassword'] = 'Falta repetir contraseña';
		}
		if ($this->getPassword() != $this->getRepeatPassword()) {
			$errors['repeatPassword'] = 'Las contraseñas son distintas';
		}
		if ($this->getEmail() == '') {
			$errors['email'] = 'Falta el e-mail';
		}
		if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 'El e-mail tiene forma fea';
		}
		$db = DB::getInstance();
		if ($db->existeElMail($this->getEmail())) {
			$errors['user'] = 'Usuario ya registrado';
		}
		return $errors;
	}

	// FIXME: eliminar metodo repetido en FormLogin
	public function getErrorCssClass($error) {
		if ($error){
			return 'has-error';
		} else {
			return 'has-success';
		}
	}

	public function getRegistratingUser() {
		return new User(
			Null,
			$this->getName(),
			$this->getLastname(),
			$this->getEmail(),
			$this->getPassword(),
			$this->getTeamName()
		);
	}

}













