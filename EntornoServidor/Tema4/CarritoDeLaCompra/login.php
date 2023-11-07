<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('var.php');
require_once('functions.php');

$login=$arrForm['login'];

$logeo = mostrarLogin($login);

require_once('template.php');
?>  