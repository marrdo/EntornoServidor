<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('db_config.php');
require_once('var.php');
require_once('functions.php');
require_once('functions_print.php');

$query = 'SELECT * FROM cantantes';

$results = $dbh->query($query);

echo '<pre>';
echo '<br>';
print_r($_POST);
echo '</pre>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['actualizar'])){
        $idcantante = $_POST['actualizar'];
        actualizarCantante($idcantante);
    }
}




$mostrarCantantes = cargarDatos($results);

require_once('template.php');
?>