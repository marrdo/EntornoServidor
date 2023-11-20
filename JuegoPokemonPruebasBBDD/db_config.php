<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('var.php');
require_once('functions.php');

/*$mysqli = new mysqli("localhost", "usuario", "contraseña", "basedatos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}*/
/**Vamos a trabajar con las siguientes variables para hacer la conexion a la base de datos */
$serverName = 'localhost';
$userName = 'admin';
$passwordUserName = '1234';
$dbName = 'Pokemon';

$conn = new mysqli($serverName,$userName,$passwordUserName,$dbName);
if(!$conn){
    die ('No se ha podido conectar a la base de datos por el siguiente error'. mysqli_connect_error());
}
// echo 'Conexion exitosa';


?>