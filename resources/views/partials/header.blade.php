<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Team Up!</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" id="theme" href="css/stylesheet.css">
	<link href="https://fonts.googleapis.com/css?family=Hind|Lato|PT+Sans|Roboto" rel="stylesheet">
</head>

<body class="<?= @$body_class ?>">

<nav class="navbar navbar-inverse"> 
	<div class="container container-fluid">

		<div class="navbar-header"> 
			<button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> 
				<span class="sr-only">Toggle navigation</span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
			</button> 
		</div> 

		
		
		<div class="row header-row">
			<div class="col-sm-7">
				<img src="images/logo_TeamUp-ss-cut.png" class="header-img">
			</div>
			
			<div class="col-sm-4">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> 
				
				
					
					<ul class="nav navbar-nav"> 
						@if (!$session->isLoggedIn())
							<li><a href="login">Iniciá sesión</a></li> 
							<li><a href="register">Registrate</a></li> 
						@endif
						<li><a href="faq">FAQ's</a></li>

		        		@if ($session->isLoggedIn())
			        		<li class="dropdown">
			          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$session->getUser()->getName()}} <span class="caret"></span></a>
			          			
			          			<ul class="dropdown-menu">
						            <li><a href="#">Mi perfil</a></li>
						            <li role="separator" class="divider"></li>
						            <li><a class="logout" href="#">Cerrar sesión</a></li>
						        </ul>
						    </li>
					    @endif

					    <li class="dropdown theme-choice">
			          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Themes<span class="caret"></span></a>
			          			
			          			<ul class="dropdown-menu">
			          				<li><a id="original" href="#">Messi</a></li>
						            <li><a id="ortigoza" href="#">Gordo Ortigoza</a></li>
						            <li><a id="peron" href="#">El General</a></li>
						            <li><a id="fort" href="#">El Comandante</a></li>
						        </ul>
						    </li>

					</ul>

				</div> 
			</div>
		</div>
	</div> 
</nav>