<?php

session_start();

require_once('classes/User.class.php');
require_once('classes/DB.class.php');
require_once('classes/Session.class.php');
require_once('functions.php');

$session = Session::getInstance();
$db = DB::getInstance();
