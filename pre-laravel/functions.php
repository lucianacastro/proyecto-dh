<?php

	function save_image() {
		if ($_FILES["profilePic"]["error"] == UPLOAD_ERR_OK) {
			$name=$_FILES["profilePic"]["name"]; 
			$file=$_FILES["profilePic"]["tmp_name"];
			$ext = pathinfo($name, PATHINFO_EXTENSION); $myFile = dirname(__FILE__);
			$myFile = $myFile . "/img/";
			$myFile = $myFile . "newImage." . $ext;
			move_uploaded_file($file, $$myFile); 
		}	
	} 


	//user constructor
	function crearUsuario($miUsuario)
	{
		$usuario = [
			"nombre" => $miUsuario["inputName"],
			"apellido" => $miUsuario["inputApellido"],
			"email" => $miUsuario["inputEmail"],
			"password" => password_hash($miUsuario["inputPassword"], PASSWORD_DEFAULT),
			"inputEquipo" => $miUsuario["inputEquipo"],
			"id" => traerNuevoId()
		];

		return $usuario;
	}

	

	function enviarAFelicidad()
	{
		header("location:felicidad.php");exit;
	}


?>