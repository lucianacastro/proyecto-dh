<?php

require_once('User.class.php');
require_once('Singleton.trait.php');

class DB {
	use Singleton;

	//atributos
	private $usersFile = 'usuarios.json';
	private $dsn = 'mysql:host=localhost;dbname=teamUp';
	private $user = 'root';
	private $password = 'root';
	private $pdo;


	private function __construct() {
		$this->pdo = new PDO($this->dsn, $this->user, $this->password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}


	private function _getUserFromAssocArray($user_assoc) {
		return new User(
			$user_assoc['id'],
			$user_assoc['name'],
			$user_assoc['lastname'],
			$user_assoc['email'],
			$user_assoc['password'],
			$user_assoc['team_name']
		);
	}

	
	public function getUsers() {
		$query_get_user = $this->pdo->prepare("SELECT id, name, lastname, email, password, team_name FROM users ORDER BY name");
		$query_get_user->execute();
		$users_assoc_list = $query_get_user->fetchAll(PDO::FETCH_ASSOC);
		$users = array_map(function($user_assoc) {
			return $this->_getUserFromAssocArray($user_assoc);
		}, $users_assoc_list);
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
			$sql = "
				INSERT INTO users (name, lastname, email, password, team_name)
				VALUES (
					'{$user->getName()}',
					'{$user->getLastname()}',
					'{$user->getEmail()}',
					'{$user->getPasswordHash()}',
					'{$user->getTeamName()}'
				)
			";

			$query = $this->pdo->prepare($sql);
		
			if (!$query->execute()) {
				// falló
			}

			$user->setId($this->pdo->lastInsertId());
		} else {
			// el usuario se está actualizando
			$sql = "
				UPDATE users (name, lastname, email, password, team_name)
				VALUES (
					'{$user->getName()}',
					'{$user->getLastname()}',
					'{$user->getEmail()}',
					'{$user->getPasswordHash()}',
					'{$user->getTeamName()}'
				) 
				WHERE id = {$user->getId()}
			";

			$query = $this->pdo->prepare($sql);
		
			if (!$query->execute()) {
				// falló
			}
		}		
	}
	
}







