<?php

class DBJson {
	
	use Singleton;

	//atributos
	private $usersFile = '../usuarios.json';


	private function _getUserFromAssocArray($user_assoc) {
		return new User(
			$user_assoc['id'],
			$user_assoc['nombre'],
			$user_assoc['apellido'],
			$user_assoc['email'],
			$user_assoc['password'],
			$user_assoc['inputEquipo']
		);
	}

	private function _getAssocArrayFromUser(User $user) {
		return [
			'id' => $user->getId(),
			'nombre' => $user->getName(),
			'apellido' => $user->getLastname(),
			'email' => $user->getEmail(),
			'password' => $user->getPasswordHash(),
			'inputEquipo' => $user->getTeamName(),
		];
	}
	
	public function getUsers() {
		$txt = file_get_contents($this->usersFile);
		$txt_lines = explode(PHP_EOL, $txt);
		$users = array_map(function($txt_line) {
			$user_assoc = json_decode($txt_line, true);
			// ['nombre' => 'Pepe', 'apellido' => 'Hola']
			return $this->_getUserFromAssocArray($user_assoc);
		}, $txt_lines);
		return $users;
	}
	
	public function getUserByEmail($email) {
		foreach ($this->getUsers() as $user) {
			if($user->getEmail() == $email) {
				return $user;
			}
		}
		return False;
	}

	public function existeElMail($mail) {
		return $this->getUserByEmail($mail);
	}

	public function guardarUsuario(User $user) {
		if (empty($user->getId())) {
			// el usuario se está creando
			$user->setId($this->traerNuevoId());
		} else {
			// el usuario se está actualizando
		}
		$user_assoc = $this->_getAssocArrayFromUser($user);
		$usuarioJSON = json_encode($user_assoc);

		file_put_contents($this->usersFile, $usuarioJSON . PHP_EOL, FILE_APPEND);
	}

	public function traerNuevoId() {
		$usuarios = $this->getUsers();
		//Para quitar el último ENTER
		array_pop($usuarios);
		if (count($usuarios) == 0) {
			return 1;
		}

		$ultimoUsuario = $usuarios[count($usuarios) - 1];
		return $ultimoUsuario->getId() + 1;
	}

	
}







