<?php


/************************The End**************************/

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));


// load configuration and helper functions
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'QR' . DS . 'autoload.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'NIC' . DS . 'autoload.php');





// Autoload classes
function classAutoLoader($className)
{
  if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
    require_once(ROOT . DS . 'core' . DS . $className . '.php');
  } elseif (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php')) {
    require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php');
  } elseif (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php')) {
    require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php');
  } elseif (file_exists(ROOT . DS . 'app' . DS . 'lib' . DS . 'Endroid' . DS . 'QrCode' . DS . $className . '.php')) {
    require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'Endroid' . DS . 'QrCode' . DS . $className . '.php');
  } elseif (file_exists(ROOT . DS . 'app' . DS . 'lib' . DS . 'Picqer' . DS . 'Barcode' . DS . $className . '.php')) {
    require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'Picqer' . DS . 'Barcode' . DS . $className . '.php');
  }
}


spl_autoload_register('classAutoLoader');
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

// if (!Session::exists(CURRENT_USER_SESSION_NAME) && COOKIE::exists(REMEBER_ME_COOCKIE_NAME)) {
//   Donor::loginUserFromCookie();
// } elseif (!Session::exists(CURRENT_USER_SESSION_NAME) && COOKIE::exists(REMEBER_ME_COOCKIE_NAME)) {
//   Staff::loginUserFromCookie();
// }

// Route the request
Router::route($url);
