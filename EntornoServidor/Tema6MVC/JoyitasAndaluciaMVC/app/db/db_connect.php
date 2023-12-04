<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Declaracion de variables para indicar basededatos, servidor, usuarioBD,passwordUser*/
$server = 'localhost';
$bbdd = 'joyitas_andalucia';
$user = 'joyitas_andalucia';
$userPass = 'joyitas';

try {
    //Establecer la conexion
    $dbh = new PDO("mysql:host=$server;dbname = $bbdd",$user,$userPass);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /* 
    PDO::ATTR_ERRMODE: Este es un atributo de configuración que determina cómo PDO
     debería manejar los errores.

    PDO::ERRMODE_EXCEPTION: Esta constante indica que PDO debe lanzar una 
    excepción en caso de error. Es decir, si ocurre algún error durante la 
    ejecución de una consulta PDO, en lugar de simplemente devolver un código 
    de error, lanzará una excepción que puedes capturar y manejar en tu código.
    */

} catch (PDOException $e) {
    die ('Error al conectar con la base de datos: '.$e->getMessage());
}

?>