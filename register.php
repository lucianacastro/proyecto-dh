<?
var_dump($_POST);
$errors=array();

if (empty($_POST['name'])) {
	$errors['name'] = "Nombre es obligatorio";
} elseif (strlen($_POST['name']) < 3) {
	$errors['name'] = "Tu nombre es tan corto como tu pene";
}

if (empty($_POST['password'])) {
	$errors['password'] = "Password es obligatorio";
} elseif (strlen($_POST['password']) < 5) {
	$errors['password'] = "La contraseña debe tener al menos 5 caracteres";
} elseif ($_POST['password'] != $_POST['repeat-password']) {
	$errors['repeat-password'] = "Las contraseñas no coinciden";
}

if (empty($_POST['email'])) {
	$errors['email'] = "E-mail es obligatorio";
}

$datos = array('name'=> @$_POST['name'],'email'=> @$_POST['email'], 'equipo' => @$_POST['equipo'], 'password'=> sha1(@$_POST['password']));
$datosJson = json_encode($datos);

$archivo = "datosUsuario.txt";
$actual = file_get_contents($archivo).$datosJson;
file_put_contents($archivo, $actual);

header("Location:/succes.php");
exit();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Registrate</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<!--link rel="stylesheet" type="text/css" href="stylesheet.css"-->
</head>

<body>
<? include "header.html" ?>


<div class="container">
	<div class="row">

		<div class="col-sm-offset-3 col-sm-6">
			
			<form class="form-horizontal" method="post">

				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<h1>Registrate!</h1>
						<? foreach($errors as $fieldName => $message): ?>
						<div class="alert alert-danger" role="alert"><?= $message ?></div>
						<? endforeach ?>
					</div>	
				</div>

			  <div class="form-group <?= isset($errors['name']) ? 'has-error' : 'has-success' ?>">
			    <label for="inputName" class="col-sm-4 control-label">Nombre completo</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="name" value="<?= @$_POST['name'] ?>" id="inputName" placeholder="Nombre completo">
			    </div>
			  </div> 

			  <div class="form-group">
			  	<label for="inputEquipo" class="col-sm-4 control-label">Soy hincha de</label>
			  	<div class="col-sm-8">
				  	
				  	<select class="form-control" name="equipo" id="inputEquipo">
				  	<? include "functions.php" ?>
				  		<? foreach (get_teams() as $team): ?>
				  		<option value="<?= $team ?>" <?= $team == @$_POST['equipo'] ? 'selected' : ''?> ><?= $team ?></option>
	  					<? endforeach ?>
					</select>

				</div>
			  </div>

			  <div class="form-group <?= isset($errors['email']) ? 'has-error' : 'has-success' ?>">
			    <label for="inputEmail3" class="col-sm-4 control-label">E-mail</label>
			    <div class="col-sm-8">
			    	<div class="input-group">
        				<span class="input-group-addon">@</span>
			    		<input type="email" name="email" value="<?= @$_POST['email'] ?>" class="form-control" id="inputEmail3" placeholder="E-mail">
			    	</div>
			    </div>
			</div>


			  <div class="form-group <?= isset($errors['password']) ? 'has-error' : 'has-success' ?>">
			    <label for="inputPassword3" class="col-sm-4 control-label">Nueva contraseña</label>
			    <div class="col-sm-8">
			      <input type="password" name="password" value= "<?= @$_POST['password'] ?>"class="form-control" id="inputPassword3" placeholder="Contraseña">
			    </div>
			  </div>

			  <div class="form-group <?= isset($errors['repeat-password']) ? 'has-error' : 'has-success' ?>">
			    <label for="inputPassword3" class="col-sm-4 control-label">Repetir contraseña</label>
			    <div class="col-sm-8">
			      <input type="password" name="repeat-password" value="<?= @$_POST['repeat-password'] ?>" class="form-control" id="inputPassword3" placeholder="Repetir contraseña">
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-8">
			      <button type="submit" name="submit" class="btn btn-default">Registrarme</button>
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