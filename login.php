<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Home</title>
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
				<li class="active"><a href="login.html">Home</a></li> 
				<li><a href="register.html">Registrate</a></li> 
				<li><a href="faq.html">Preguntas Frecuentes</a></li> 
			</ul> 
		</div> 
	</div> 
</nav>


<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6">
			<form class="form-horizontal">

			  	<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<h1>Ingresá al sitio!</h1>
					</div>	
				</div>

				<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-4 control-label">E-mail</label>
			    	<div class="col-sm-8">
			    		<div class="input-group">
	        				<span class="input-group-addon">@</span>
				    		<input type="email" class="form-control" id="inputEmail3" placeholder="E-mail">
			    		</div>
			    	</div>
				</div>



			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-4 control-label">Contraseña</label>
			    <div class="col-sm-8">
			      <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-8">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox"> Recordarme
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-8">
			      <button type="submit" class="btn btn-default">Ingresar</button>
			    </div>
			  </div>

			</form>

		    <div class="row">
		      <label class="col-sm-offset-4 col-sm-8">
		        <hr/>
		        <a class="links" href="">Olvidé mi contraseña</a>
		      </label>
		    </div>
	    </div>
	</div>
</div>


<script type="text/javascript" src="jquery/jquery-3.2.1.slim.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>