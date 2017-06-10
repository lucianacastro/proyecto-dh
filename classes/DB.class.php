<?php

require_once('User.class.php');
require_once('Singleton.trait.php');

class DB {
	use Singleton;

	//atributos
	private $usersFile = 'usuarios.json';


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
		$user_assoc = $this->_getAssocArrayFromUser($user);
		$usuarioJSON = json_encode($user_assoc);

		file_put_contents($this->usersFiles, $usuarioJSON . PHP_EOL, FILE_APPEND);
	}

	function traerNuevoId()
	{
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







