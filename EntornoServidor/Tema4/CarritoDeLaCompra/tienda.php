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

if ((isset($_SESSION['userName'])) && (isset($_SESSION['userPassword']))) {
    $userName = $_SESSION['userName'];
    $userPassword = $_SESSION['userPassword'];
    //Debugger
    // echo '<pre>';
    // echo 'Nombre: ' . $userName . '<br>';
    // echo 'Password: ' . $userName;
    // echo '</pre>';
}



require_once('template.php');
