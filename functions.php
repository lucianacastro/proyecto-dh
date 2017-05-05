<?php
function get_teams() {
	$teams = ['-- Elegí tu club --', 'Club Atlético Boca Juniors', 'Club Atlético Independiente', 'Club Atlético River Plate', 'Racing Club', 'Club Atlético San Lorenzo de Almagro','Club Atlético Huracán', 'Club Atlético Banfield', 'Club Atlético Belgrano', 'Club Atlético Newell\'s Old Boys', 'Club Ferro Carril Oeste', 'Club Atlético Aldosivi', 'Asociación Atlética Argentinos Juniors', 'Arsenal Fútbol Club', 'Atlético de Rafaela', 'Club Atlético Colón de Sant Fe', 'Club Atlético Tucumán', 'Club Social y Deportivo Defensa y Justicia', 'Club estudiantes de la Plata', 'Club Ginmasia y Esgrima de la Plata', 'Club Deportivo Godoy Cruz', 'Club Atlético Lanús', 'Club Olimpo de Bahia Blanca', 'Quilmes Atlético Club', 'Club Atlético Rosario Central', 'San Martin SJ', 'Club Atlético Sarmiento de Junín', 'Club Atlético Temperley', 'Club Atlético Tigre', 'Club Atlético Unión de Santa Fe', 'Club Atlético Patronato de la Juventud Católica'];
	asort($teams);
	return $teams;

}

function get_error_css_class($error) {
	if ($error){
		return 'has-error';
	} else {
		return 'has-success';
	}
}


function validate_user(array $data) {

	$errors = array();

	if (empty($data['name'])) {
		$errors['name'] = "Nombre es obligatorio";
	} elseif (strlen($data['name']) < 3) {
		$errors['name'] = "Tu nombre es tan corto como tu pene";
	}

	if (empty($data['password'])) {
		$errors['password'] = "Password es obligatorio";
	} elseif (strlen($data['password']) < 5) {
		$errors['password'] = "La contraseña debe tener al menos 5 caracteres";
	} elseif ($data['password'] != $data['repeat-password']) {
		$errors['repeat-password'] = "Las contraseñas no coinciden";
	}

	if (empty($data['email'])) {
		$errors['email'] = "E-mail es obligatorio";
	}

	return $errors;
}

function save_user($data) {

	$newData = array(
		'name' => @$data['name'],
		'email' => @$data['email'],
		'equipo' => @$data['equipo'],
		'password' => sha1(@$data['password'])
	);

	$json = json_encode($newData);

	$file = "datosUsuario.txt";
	$current = file_get_contents($file).$json;
	file_put_contents($file, $current);

}

?>