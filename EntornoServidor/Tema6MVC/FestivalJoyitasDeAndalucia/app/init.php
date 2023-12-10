<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Este archivo podría ser utilizado para 
// inicializar cualquier configuración global 
// o funciones que necesites en 
// toda la aplicación
//TODO: Zona de declaración de constantes, etc
require_once('core.php');

$core = new Core();
?>