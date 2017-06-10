<?php

include_once "init.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $session->logoutUser();
}