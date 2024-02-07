<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Este es el punto de entrada 
// principal de tu aplicación. 
// Aquí es donde se deberían manejar las 
// solicitudes y dirigirse al controlador correspondiente.
if (!isset($_GET['path'])) {
    // No hay path en la URL actual, redirigimos a la ruta deseada
    header('Location: index.php?path=artistas/listar');
    exit();
}
require_once('../app/init.php');



?>