<?php

define('LARAVEL_START', microtime(true));


require_once(__DIR__.'/../app/Singleton.php');
require_once(__DIR__.'/../app/User.php');
require_once(__DIR__.'/../app/DB.php');
require_once(__DIR__.'/../app/SessionHelper.php');
require_once(__DIR__.'/../app/FormRegister.php');
require_once(__DIR__.'/../app/FormLogin.php');
require_once(__DIR__.'/functions.php');

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so we do not have to manually load any of
| our application's PHP classes. It just feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';