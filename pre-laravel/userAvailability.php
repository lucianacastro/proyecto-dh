<?php
include_once "init.php";

// userAvailability.php?email=test@example.com

if (isset($_GET['email'])) {
	$user = $db->getUserByEmail($_GET['email']);
	$result = [
		'available' => !$user,
	];
} else {
	$result = [
		'error' => 'Missing email query parameter',
	];
	http_response_code(400);
}

header('Content-Type: application/json');
print json_encode($result);