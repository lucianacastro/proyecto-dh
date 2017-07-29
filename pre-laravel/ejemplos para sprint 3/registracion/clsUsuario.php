<?php

class Usuario {


	public $email;
	public $password;
	public $usuario;

	public $db;

	public function __construct($db) {

		$this->db = $db;

	}

	public function existeUsuarioConEsteEmail($e) {

		$sql = "SELECT * FROM usuarios WHERE email = '".$e."'";

		$this->db->query($sql);
		return $this->db->fetchColumn();
	}

	public function registrarUsuario($arr) {


		$sql = "INSERT INTO usuarios (usuario, email, password) VALUES ('".$arr['usuario']."','".$arr['email']."','".md5($arr['password'])."')";

		$this->db->query($sql);

		return $this->db->lastInsertId();
	}

	public function logeo($arr){
		$sql = "SELECT id, usuario, email FROM usuarios
		 WHERE email = '".$arr['email']."'
		 and password = '".md5($arr['password'])."'";
		 //echo $sql;
		$result = $this->db->query($sql);
		$usuario = $result->fetch(PDO::FETCH_ASSOC);
		//print_r($usuario);

		if($usuario){
			session_start();
			$_SESSION['usuario']=$usuario['usuario'];
			$_SESSION['email']=$usuario['email'];
			$_SESSION['id']=$usuario['id'];
			header('location:bienvenidos.php');
			exit();
		}else{
			// retorno error y muestro en el formulario.
		}

	}

}