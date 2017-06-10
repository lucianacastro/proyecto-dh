<?php

class User {
	//atributos
	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $inputEquipo;	

	public function __construct($id = '', $name = '', $lastname = '', $email = '', $password = '', $teamName = '') {
		if (empty($id)) {
			// es un usuario nuevo, asumimos que el password no viene hasheado
			$this->setPassword($password);
		} else {
			// es un usuario existente, asumimos que el password sí viene hasheado
			$this->setId($id);
			$this->password = $password; // se saltea el hashing para que no hashee dos veces.
		}
		$this->setName($name);
		$this->setLastname($lastname);
		$this->setEmail($email);
		$this->setTeamName($teamName);
	}

	public function getId() {
		return $this->id;
	} 

	public function getName() {
		return $this->nombre;
	} 

	public function getLastname() {
		return $this->apellido;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPasswordHash() {
		return $this->password;
	}

	public function getTeamName() {
		return $this->inputEquipo;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setName($name) {
		$this->nombre = $name;
	}

	public function setLastname($lastname) {
		$this->apellido = $lastname;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setPassword($password) {
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}

	public function setTeamName($teamName) {
		$this->inputEquipo = $teamName;
	}




}







