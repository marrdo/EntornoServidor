<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('var.php');
require_once('functions.php');

/* Declaracion de variables para indicar basededatos, servidor, usuarioBD,passwordUser*/
$serverName = 'localhost';
$userName = 'admin';
$passwordUserName = '1234';
$dbName = 'Pokemon';

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $passwordUserName);
    // manejar las excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    PDO::ATTR_ERRMODE: Este es un atributo de configuración que determina cómo PDO
     debería manejar los errores.

    PDO::ERRMODE_EXCEPTION: Esta constante indica que PDO debe lanzar una 
    excepción en caso de error. Es decir, si ocurre algún error durante la 
    ejecución de una consulta PDO, en lugar de simplemente devolver un código 
    de error, lanzará una excepción que puedes capturar y manejar en tu código.
    */
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// echo 'Conexion exitosa';
?>
