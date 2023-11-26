<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    // Creación del objeto de conexión a la base de datos
    $dbh = new mysqli('localhost', 
    'joyitas_andalucia', 
    'joyitas', 
    'joyitas_andalucia');


    // Verificar la conexión
    if ($dbh->connect_error) {
        throw new Exception("La conexión a la base de datos falló: " . $dbh->connect_error);
    }

} catch (Exception $e) {
    // Manejar cualquier error de conexión
    die("Error de conexión: " . $e->getMessage());
}
?>
