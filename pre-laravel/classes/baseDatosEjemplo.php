<?php


	// __construct  (DB)
	$dsn = 'mysql:host=localhost;dbname=teamUp';
	$user = $password = 'root';
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


 	//insertar usuario
 	$sql = "INSERT INTO users (name, lastname, email, password, team_name, dob, gender) VALUES ('Mao', 'Bort', 'mao2@gmail.com', '123', 'Tigre', '2015-01-01', 'male')";

	$query = $pdo->prepare($sql);
	
	if (!$query->execute()) {
		// falló
	}


	// get users
	$query_get_user = $pdo->prepare("SELECT id, name, lastname FROM users ORDER BY name");
	$query_get_user->execute();
	$users = $query_get_user->fetchAll(PDO::FETCH_ASSOC);
	print_r($users);

