<?php
include_once "init.php";

// 

$countUsers = count($db->getUsers());
$result = ['total' => $countUsers];

header('Content-Type: application/json');
print json_encode($result);