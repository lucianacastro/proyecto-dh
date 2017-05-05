<?php
	function validarUsuario($miUsuario)
	{
		$errores = [];

		if (trim($miUsuario["inputName"]) == "")
		{
			$errores[] = "Falta el Name";
		}
		if (trim($miUsuario["inputApellido"]) == "")
		{
			$errores[] = "Falta el Apellido";
		}
		if (trim($miUsuario["inputPassword"]) == "")
		{
			$errores[] = "Falta la Password";
		}
		if (trim($miUsuario["inputPassword2"]) == "")
		{
			$errores[] = "Falta el inputPassword2";
		}
		if ($miUsuario["inputPassword"] != $miUsuario["inputPassword2"])
		{
			$errores[] = "Las contraseñas son distintas";
		}
		if ($miUsuario["inputEmail"] == "")
		{
			$errores[] = "Falta el mail";
		}
		if (!filter_var($miUsuario["inputEmail"], FILTER_VALIDATE_EMAIL))
		{
			$errores[] = "El mail tiene forma fea";
		}
		if (existeElMail($miUsuario["inputEmail"]))
		{
			$errores[] = "Usuario ya registrado";
		}
		return $errores;
	}

	function existeElMail($mail)
	{
		$usuarios = file_get_contents("usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		array_pop($usuariosArray);

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

			if ($mail == $usuarioArray["mail"])
			{
				return true;
			}
		}

		return false;
	}

	function guardarUsuario($miUsuario) 
	{
		$usuarioJSON = json_encode($miUsuario);

		file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
	}

	function crearUsuario($miUsuario)
	{
		$usuario = [
			"nombre" => $miUsuario["inputName"],
			"apellido" => $miUsuario["inputApellido"],
			"mail" => $miUsuario["inputEmail"],
			"password" => password_hash($miUsuario["inputPassword"], PASSWORD_DEFAULT),
			"inputEquipo" => $miUsuario["inputEquipo"],
			"id" => traerNuevoId()
		];

		return $usuario;
	}

	function traerNuevoId()
	{
		$usuarios = file_get_contents("usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		//Para quitar el último ENTER
		array_pop($usuariosArray);

		if (count($usuarios) == 0) {
			return 1;
		}

		$ultimoUsuario = $usuariosArray[count($usuariosArray) - 1];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);

		return $ultimoUsuarioArray["id"] + 1;
	}

	function enviarAFelicidad()
	{
		header("location:felicidad.php");exit;
	}
?>