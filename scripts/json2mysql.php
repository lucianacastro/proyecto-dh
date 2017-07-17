<?php
//Hago un require de mis dos clases de base de datos, la que uso actualmente y la vieja que funcionaba con el json
require_once('../classes/DB.class.php');
require_once('../classes/DBJson.class.php');

//Creo una instancia de cada DB
$dbjson = DBJson::getInstance();
$db = DB::getInstance();

//Me traigo los usurios existentes en el json
$users = $dbjson->getUsers();
//Inserto cada uno de los usuarios en mi base de datos
foreach ($users as $user) {
	$user->setId(Null);
	$db->guardarUsuario($user);
	echo'Usuario '. $user->getEmail()." insertado.\n";
}

echo 'listo';