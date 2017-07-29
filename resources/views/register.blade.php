@include('partials.header') 

<div class="container">
	<div class="row">

		<div class="col-sm-6">
			<div class="register-img col-sm-12">
				
				<div class="icon-register-container ball">
					<img class="register-icon ball" src="images/1_icono_pelota.png"/>
					<div class="text-register-icon">Armá tu equipo con amigos o conocidos de tu red.</div>
				</div>
				<div class="icon-register-container field">
					<img class="register-icon field" src="images/2_icono_cancha.png"/>
					<div class="text-register-icon">Buscá y reservá canchas cercanas a tu casa o trabajo.</div>
				</div>
				<div class="icon-register-container trophy">
					<img class="register-icon trophy" src="images/3_icono_trofeo.png"/>
					<div class="text-register-icon trophy">Encontrá torneos para tu equipo, armá tu agenda y disfrutá del fútbol</div>
				</div>

			</div>
		</div>

		<div class="col-sm-6 register-container">
			
			<form class="form-horizontal" method="POST">
				{{ csrf_field() }}

				<div class="form-group">
					<div class="col-sm-12">
					
						
						@if (!empty($errors))
							<div class="alert alert-danger" role="alert">
								<ul>
									@foreach($errors as $fieldName => $message)
										<li>{{$message}}</li>
									@endforeach
								</ul>
							</div>
						@endif

					</div>	
				</div>

			  <div class="form-group {{!empty($errors) ? $formRegister->getErrorCssClass(@$errors['name']) : ''}}">
			    <label for="name" class="col-sm-12 control-label label-title">Nombre</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="name" placeholder="Ingresá tu nombre" value="{{@$_POST['name']}}" name="name">
			    </div>
			  </div>
			  <div class="form-group {{!empty($errors) ? $formRegister->getErrorCssClass(@$errors['lastname']) : ''}}">
			    <label for="lastname" class="col-sm-12 control-label label-title">Apellido</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="lastname" placeholder="Ingresá tu apellido" value="{{@$_POST['lastname']}}" name="lastname">
			    </div>
			  </div>


			  <div class="form-group">
			  	<label for="teamName" class="col-sm-12 control-label label-title">Soy hincha de</label>
			  	<div class="col-sm-12">
				  	<select class="form-control" id="teamName" name="teamName">
				  		<option value="">-- Elegí tu club --</option>
				  		@foreach ($formRegister->getTeamNames() as $teamName)
				  			<option {{$teamName == @$_POST['teamName'] ? 'selected' : ''}} value="{{$teamName}}">
				  				{{$teamName}}</option>
				  		@endforeach
					
					</select>
				</div>
			  </div>

			  <div class="form-group {{!empty($errors) ? $formRegister->getErrorCssClass(@$errors['email']) : ''}}">
			    <label for="email" class="col-sm-12 control-label label-title">E-mail</label>
			    <div class="col-sm-12">
			    	<div class="input-group">
        				<span class="input-group-addon">@</span>
			    		<input type="email" class="form-control" id="email" name="email" value="{{@$_POST['email']}}" placeholder="Ingresá tu e-mail">
			    	</div>
			    </div>
			  </div>

			  <div class="form-group {{!empty($errors) ? $formRegister->getErrorCssClass(@$errors['password']) : ''}}">
			    <label for="password" class="col-sm-12 control-label label-title">Nueva contraseña</label>
			    <div class="col-sm-12">
			      <input type="password" class="form-control" id="password" value= "{{@$_POST['password']}}" name="password" placeholder="Ingresá una contraseña">
			    </div>
			  </div>

			  <div class="form-group {{!empty($errors) ? $formRegister->getErrorCssClass(@$errors['repeatPassword']) : ''}}">
			    <label for="repeatPassword" class="col-sm-12 control-label label-title">Repetir contraseña</label>
			    <div class="col-sm-12">
			      <input type="password" class="form-control" id="repeatPassword" value="{{@$_POST['repeatPassword']}}" name="repeatPassword" placeholder="Repetí tu contraseña">
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-8">
			      <button type="submit" class="btn btn-success login-button pull-right">Registrate</button>
			    </div>
			  </div>
			</form>

		    
	    </div>
	 
	</div>
</div>

@include('partials.footer')