<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('var.php');
require_once('functions.php');

if ((isset($_SESSION['userName']))) {
    $userName = $_SESSION['userName'];
} else {
    header('Location: login.php');
}

if (isset($_POST['addProduct'])) {

    $_SESSION['cantidades'] = $_POST['cantidades'];
    $cantidades = $_POST['cantidades'];
    $carrito = llenarCarro($cantidades, $productos);

    $_SESSION['carrito'] = $carrito;
}
if (isset($_POST['verCarro'])) {
    $_SESSION['redireccion'] = 'tienda';
    header('Location: carrito.php');
}

if (isset($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
}

if (((isset($_SESSION['redireccion'])) && ($_SESSION['redireccion'] == 'carrito'))
    ||
    (isset($_SESSION['carrito']))
) {

    $mostrarTienda = mostrarTienda($carrito);
} else {
    $mostrarTienda = mostrarTienda($productos);
}

require_once('template.php');
