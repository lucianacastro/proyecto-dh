<?php
	include_once "init.php";

	//esto es para que si está logeado no pueda acceder al form de register
	if(is_logged_in()) {
	header("Location: success.php");
	exit();
}
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

<?php include "header.phtml" ?>
<div class="container">
	<div class="row">

		<div class="col-sm-offset-3 col-sm-6">
			
			<form class="form-horizontal" method="POST">

				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<h1>Registrate!</h1>
						
						<? if (isset($errores)): ?>
							<div class="alert alert-danger" role="alert">
								<ul>
									<?php foreach($errores as $fieldName => $message): ?>
										<li><?= $message ?></li>
									<?php endforeach ?>
								</ul>
							</div>
						<? endif ?>

					</div>	
				</div>

			  <div class="form-group <?= isset($errores) ? get_error_css_class(@$errores['name']) : '' ?>">
			    <label for="inputName" class="col-sm-4 control-label">Nombre</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="inputName" placeholder="Nombre" value="<?= @$_POST['name'] ?>" name="inputName">
			    </div>
			  </div>
			  <div class="form-group <?= isset($errores) ? get_error_css_class(@$errores['surname']) : '' ?>">
			    <label for="inputName" class="col-sm-4 control-label">Apellido</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="inputApellido" placeholder="Apellido" value="<?= @$_POST['surname'] ?>" name="inputApellido">
			    </div>
			  </div>


			  <div class="form-group">
			  	<label for="inputEquipo" class="col-sm-4 control-label">Soy hincha de</label>
			  	<div class="col-sm-8">
				  	<select class="form-control" id="inputEquipo" name="inputEquipo">
				  		<option>-- Elegí tu club --</option>
				  		<?php foreach ($arrayEquipos as $value): ?>
				  			<option <?= $value == @$_POST['inputEquipo'] ? 'selected' : ''?> >
				  				<?= $value ?></option>
				  		<?php endforeach ?>
					
					</select>
				</div>
			  </div>

			  <div class="form-group <?= isset($errores) ? get_error_css_class(@$errores['email']) : '' ?>">
			    <label for="inputEmail3" class="col-sm-4 control-label">E-mail</label>
			    <div class="col-sm-8">
			    	<div class="input-group">
        				<span class="input-group-addon">@</span>
			    		<input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?= @$_POST['inputEmail'] ?>" placeholder="E-mail">
			    	</div>
			    </div>
			</div>


			  <div class="form-group <?= isset($errores) ? get_error_css_class(@$errores['password']) : '' ?>">
			    <label for="inputPassword3" class="col-sm-4 control-label">Nueva contraseña</label>
			    <div class="col-sm-8">
			      <input type="password" class="form-control" id="inputPassword" value= "<?= @$_POST['inputPassword'] ?>" name="inputPassword" placeholder="Contraseña">
			    </div>
			  </div>

			  <div class="form-group <?= isset($errores) ? get_error_css_class(@$errores['repeat-password']) : '' ?>">
			    <label for="inputPassword3" class="col-sm-4 control-label">Repetir contraseña</label>
			    <div class="col-sm-8">
			      <input type="password" class="form-control" id="inputPassword2" value="<?= @$_POST['inputPassword2'] ?>" name="inputPassword2" placeholder="Repetir contraseña">
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

<?php include "footer.phtml"?>
