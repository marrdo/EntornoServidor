<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('var.php');
require_once('functions.php');

if ((isset($_SESSION['userName']))) {
    $userName = $_SESSION['userName'];
    $carrito = $_SESSION['carrito'];
} else {
    header('Location: login.php');
}
$cantidades = $_SESSION['cantidades'];

/**
 * Funcionalidades del los botones de restar en Carrito
 */
/** 
 * ///////////   BOTONES DE SUMA Y RESTA   /////////////////////////
 * Comprobamos si estan establecidos los botones de resta.
 * Si estan establecidos, seguimos los if, para hacer una resta en el array 
 * cantidades.
 * Como ultimo paso actualizamos la sesion que vamos a mandar de nuevo, que 
 * es la forma por la cual cogemos los valores del array para actualizarlos.
 */
if ((isset($_POST['restaBirra1']))) {
    $cantidades[0] = --$cantidades[0];
    $_SESSION['cantidades'] = $cantidades;
} else if ((isset($_POST['restaBirra2']))) {
    $cantidades[1] = --$cantidades[1];
    $_SESSION['cantidades'] = $cantidades;
} else if ((isset($_POST['restaBirra3']))) {
    $cantidades[2] = --$cantidades[2];
    $_SESSION['cantidades'] = $cantidades;
}
if ((isset($_POST['sumaBirra1']))) {
    $cantidades[0] = ++$cantidades[0];
    $_SESSION['cantidades'] = $cantidades;
} else if ((isset($_POST['sumaBirra2']))) {
    $cantidades[1] = ++$cantidades[1];
    $_SESSION['cantidades'] = $cantidades;
} else if ((isset($_POST['sumaBirra3']))) {
    $cantidades[2] = ++$cantidades[2];
    $_SESSION['cantidades'] = $cantidades;
}


/** 
 * ///////////////////////  BOTONES DE BORRAR PRODUCTO ///////////////////
 * Vamos a comprobar con los if si se establece borrar productos concretos
 * 
 */

if (isset($_POST['borrarProducto1'])) {
    $cantidades[0] = 0;
    $_SESSION['cantidades'] = $cantidades;
} else if (isset($_POST['borrarProducto2'])) {
    $cantidades[1] = 0;
    $_SESSION['cantidades'] = $cantidades;
} else if (isset($_POST['borrarProducto3'])) {
    $cantidades[2] = 0;
    $_SESSION['cantidades'] = $cantidades;
}

/** 
 * /////////////////////  BOTON PARA BORRARLO TODO ////////////////////////////
 * Comrpobamos si esta establecido el boton en post, y tras esto dejamos 
 * el array cantidades a 0.
 */
if (isset($_POST['borrarProductos'])) {
    for ($i = 0; $i < count($cantidades); $i++) {
        $cantidades[$i] = 0;
        $_SESSION['cantidades'] = $cantidades;
    }
}

/**
 * Primero comprobamos si se establecen las restas y en la segunda fila
 * las sumas.
 */
if ((isset($_POST['restaBirra1']) || isset($_POST['restaBirra2']) || isset($_POST['restaBirra3'])) ||
    ((isset($_POST['sumaBirra1']) || isset($_POST['sumaBirra2']) || isset($_POST['sumaBirra3']))) ||
    ((isset($_POST['borrarProducto1'])) || (isset($_POST['borrarProducto2'])) || (isset($_POST['borrarProducto3']))) ||
    (isset($_POST['borrarProductos']))
) {
    $carrito = llenarCarro($cantidades, $carrito);
    $_SESSION['carrito'] = $carrito;
}

/** 
 * ////////////  BOTON VOLVER A TIENDA ///////////////////////////////
 * Este es el boton de redireccion a tienda.
 */
if (isset($_POST['irTienda'])) {
    $_SESSION['redireccion'] = 'carrito';
    header('Location: tienda.php');
}

$mostrarCarro = mostrarCarrito($carrito);
require_once('template.php');
