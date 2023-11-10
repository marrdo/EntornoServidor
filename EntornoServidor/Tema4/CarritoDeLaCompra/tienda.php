<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('var.php');
require_once('functions.php');
//Debugger
echo '<pre>';
echo '<br>Session<br>';
print_r($_SESSION);
echo '</pre>';
echo '<pre>';
echo '<br>Post<br>';
print_r($_POST);
echo '</pre>';

if ((isset($_SESSION['userName']))) {
    $userName = $_SESSION['userName'];
} else {
    header('Location: login.php');
}

if (isset($_POST['addProduct'])) {
    if(isset($_POST['1']) && ($_POST['1'] != 0)){
        $cantidad1 = $_POST['1'];
        $carrito[]=llenarCarrito($productos,$cantidad1,$carrito);

    }
    
    $cantidad2 = $_POST['2'];
    $cantidad3 = $_POST['3'];

    $_SESSION['1'] = $cantidad1;
    $_SESSION['2'] = $cantidad2;
    $_SESSION['3'] = $cantidad3;

}
if(isset($_POST['verCarro'])){
    header('Location: carrito.php');
}


$mostrarTienda = mostrarTienda($productos);

require_once('template.php');
