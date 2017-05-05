<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Registrate</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>



<body>

<!-- Navbar (header) luego haremos un include del mismo con php-->
<nav class="navbar navbar-inverse"> 
	<div class="container-fluid"> 
		<div class="navbar-header"> 
			<button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> 
				<span class="sr-only">Toggle navigation</span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
			</button> 
			<a href="#" class="navbar-brand">Team up!</a> 
		</div> 
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> 
			<ul class="nav navbar-nav"> 
				<li ><a href="login.php">Home</a></li> 
				<li class="active"><a href="register.php">Registrate</a></li> 
				<li><a href="faq.php">Preguntas Frecuentes</a></li> 
			</ul> 
		</div> 
	</div> 
</nav>

<?php
	require_once("funciones.php");
	$pNombre = "";
	$pApellido = "";
	$pMail = "";

	$arrayEquipos = ['Club Atlético Boca Junior','Club Atlético Independiente','Club Atlético River Plate','Racing Club','Club Atlético San Lorenzo de Almagro','Club Atlético Huracán','Club Atlético Banfield','Club Atlético Belgrano',"Club Atlético Newell's Old Boys",'Club Ferro Carril Oeste','Tigre'];
					

	if ($_POST)
	{
		$pNombre = $_POST["inputName"];
		$pApellido = $_POST["inputApellido"];
		$miEquipo = $_POST["inputEquipo"];
		$pMail = $_POST["inputEmail"];
		//Acá vengo si me enviaron el form

		//Validar
		$errores = validarUsuario($_POST);

		// Si no hay errores....
		if (empty($errores))
		{
			$usuario = crearUsuario($_POST);
			// Guardar al usuario en un JSON
			guardarUsuario($usuario);
			// Reenviarlo a la felicidad
			enviarAFelicidad();
		}
	}
?>

<div class="container">
	<div class="row">

		<div class="col-sm-offset-3 col-sm-6">
			
			<form class="form-horizontal" method="POST">

				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<h1>Registrate!</h1>
					</div>	
				</div>

			  <div class="form-group">
			    <label for="inputName" class="col-sm-4 control-label">Nombre </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="inputName" placeholder="Nombre" name="inputName">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputName" class="col-sm-4 control-label">Apellido </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="inputApellido" placeholder="Apellido" name="inputApellido">
			    </div>
			  </div>


			  <div class="form-group">
			  	<label for="inputEquipo" class="col-sm-4 control-label">Soy hincha de</label>
			  	<div class="col-sm-8">
				  	<select class="form-control" id="inputEquipo" name="inputEquipo">
				  		<option>-- Elegí tu club --</option>
				  		<?php foreach ($arrayEquipos as $value) {
				  			echo '<option>'.$value.'</option>';
				  		} ?>
					</select>
				</div>
			  </div>

			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-4 control-label">E-mail</label>
			    <div class="col-sm-8">
			    	<div class="input-group">
        				<span class="input-group-addon">@</span>
			    		<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail">
			    	</div>
			    </div>
			</div>


			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-4 control-label">Nueva contraseña</label>
			    <div class="col-sm-8">
			      <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-4 control-label">Repetir contraseña</label>
			    <div class="col-sm-8">
			      <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Repetir contraseña">
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-8">
			      <button type="submit" class="btn btn-default">Registrarme</button>
			    </div>
			  </div>
			</form>

		    
	    </div>
	</div>
</div>


<script type="text/javascript" src="jquery/jquery-3.2.1.slim.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>