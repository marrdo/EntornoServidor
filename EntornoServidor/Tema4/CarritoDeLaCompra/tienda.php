<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('var.php');
require_once('functions.php');
//Debugger
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

if ((isset($_SESSION['userName']))) {
    $userName = $_SESSION['userName'];
    
}else{
    header('Location: login.php');
}


$mostrarTienda = mostrarTienda($productos);

require_once('template.php');