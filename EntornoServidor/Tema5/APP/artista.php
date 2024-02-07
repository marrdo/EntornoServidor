<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('db_config.php');
require_once('functions.php');
require_once('functions_print.php');
//debugger
// echo '<pre>';
// echo '<br>';
// print_r($_POST);
// echo '</pre>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Desactivar autocommit
        $dbh->autocommit(false);
        // Iniciar la transacción
        $dbh->begin_transaction();
        if (isset($_POST['actualizar'])) {
            // Obtener el ID del cantante a actualizar
            $idCantante = $_POST['actualizar'];

            // Encontrar los datos actuales del cantante en la base de datos
            $cantante = encontrarCantante($dbh, $idCantante);
            //Mostramos el formulario para que actulicen al cantante
            $mostrarFormActualizar = mostrarFormActualizar($cantante);
        } elseif (isset($_POST['formActualizar'])) {
            // Obtener el ID del cantante a actualizar
            $idCantante = $_POST['formActualizar'];
            //Debugger    
            // echo '<pre>';
            // echo '<br>';
            // print_r($_POST);
            // echo '</pre>';
            // Modificación: Utilizar consultas preparadas y vinculación de parámetros
            $query = 'UPDATE cantantes SET nombre=?, genero=?, fecha_nacimiento=?, precio_bolo=?, localidad_nacimiento=? WHERE id=?';
            $params = array("sssdsi", $_POST['nombre'], $_POST['genero'], $_POST['fecha_nacimiento'], $_POST['precio_bolo'], $_POST['localidad_nacimiento'], $idCantante);

            // Actualizar los datos del cantante en la base de datos
            $actualizado = actualizar($dbh, $query, $params);

            // Mostrar un mensaje de actualización si fue exitoso
            if ($actualizado) $actualizado = mostraractualizacion($_POST['nombre']);
        } elseif (isset($_POST['borrar'])) {
            // Obtener el ID del cantante a borrar
            $idCantante = $_POST['borrar'];

            // Encontrar los datos actuales del cantante en la base de datos
            $cantante = encontrarCantante($dbh, $idCantante);

            // Modificación: Utilizar consultas preparadas y vinculación de parámetros
            $query = 'DELETE FROM cantantes WHERE id=?';
            $borrado = borrarCantante($dbh, $query, $idCantante);

            // Mostrar un mensaje de borrado si fue exitoso
            if ($borrado) $borrado = mostrarBorrado($cantante['nombre']);
        } elseif (isset($_POST['incorporar'])) {
            // Obtener los datos del formulario POST
            $nombre = $_POST['nombre'];
            $genero = $_POST['genero'];
            $fechNacimiento = $_POST['fechNacimiento'];
            $precio_bolo = $_POST['precioBolo'];
            $localidad = $_POST['localidad'];
            echo '<pre>';
            echo '<br>';
            print_r($_POST);
            echo '</pre>';
            // Llamar a la función para incorporar un cantante a la base de datos
            incorporarCantante($dbh, $nombre, $genero, $fechNacimiento, $precio_bolo, $localidad);

            // Llamar a la función para mostrar un mensaje de incorporación exitosa
            $incorporacion = mostrarIncorporacion($_POST['nombre']);
        }
    } catch (Exception $e) {
        // Rollback de la transacción en caso de error
        $dbh->rollback();
        // Manejar la excepción
        $mensajeExcepcion = $e->getMessage();
        
    } finally {
        // Reactivar autocommit al final, ya sea que la transacción haya tenido éxito o no
        $dbh->autocommit(true);
    }
}

/*Esta query con el result esta aqui debajo para que cuando recargue 
lo ultimo que vuelva a leer sea la tabla actualizada*/

$mostrarCantantes = cargarDatos($dbh);

require_once('template.php');
