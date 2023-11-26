<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db_config.php');
require_once('functions_print.php');
require_once('functions.php');



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        $dbh->autocommit(false);

        $dbh->begin_transaction();

        if(isset($_POST['verTodosLosConciertos'])){
            $mostrarTodosLosConciertos = mostrarTodosLosConciertos($dbh);
        }

        if(isset($_POST['verConciertos'])){
            $idCantante = $_POST['verConciertos'];
            $mostrarConciertoCantante = mostrarConciertoCantante($dbh,$idCantante);
        }

        if(isset($_POST['actualizarConcierto'])){
            $idConcierto = $_POST['actualizarConcierto'];

            $formModificarConcierto = modificarConcierto($dbh,$idConcierto);

            $mostrarTodosLosConciertos = mostrarTodosLosConciertos($dbh);
        }elseif(isset($_POST['actualizarConciertoFormulario'])){

            $idConcierto = $_POST['actualizarConciertoFormulario'];
            $concierto = encontrarConcierto($dbh,$idConcierto);

            $cantante = encontrarCantante($dbh,$_POST['nombreArtista']);

            $idCantante = $cantante['id'];
            $fecha = $_POST['fechaConcierto'];
            $lugar = $_POST['lugarConcierto'];
            $aforo = $_POST['aforoConcierto'];
            $precio = $_POST['precioConcierto'];
            $hora = $_POST['horaConcierto'];

            $actualizarConcierto = actualizarConcierto($dbh,$idConcierto,$idCantante,$fecha,$lugar,$aforo,$precio,$hora);

            if($actualizarConcierto) $actualizarConcierto = conciertoActualizado($_POST['nombreArtista']);
            $mostrarTodosLosConciertos = mostrarTodosLosConciertos($dbh);
        }

        if(isset($_POST['borrarConcierto'])){
            $idConcierto = $_POST['borrarConcierto'];
            $borrarConcierto = borrarConcierto($dbh,$idConcierto);
            $mostrarTodosLosConciertos = mostrarTodosLosConciertos($dbh);
            
        }
        if(isset($_POST['incorporarConcierto'])){
            $nombre = $_POST['nombre'];
            $cantante = encontrarCantante($dbh,$nombre);
            $idCantante = $cantante['id'];
            $fecha = $_POST['fecha'];
            $lugar = $_POST['lugar'];
            $aforo = $_POST['aforo'];
            $precio = $_POST['precio'];
            $hora = $_POST['hora'];

            $incorporado = aniadirConcierto($dbh,$idCantante,$fecha,$lugar,$aforo,$precio,$hora);
            if($incorporado){
                $mostrarIconporacion = mostrarIconporacion($nombre);
            }
            $mostrarTodosLosConciertos = mostrarTodosLosConciertos($dbh);
        }
    }catch(Exception $e){
        $dbh->rollback();

        $mensajeExcepcion = $e->getMessage();
    }finally {
        // Reactivar autocommit al final, ya sea que la transacción haya tenido éxito o no
        $dbh->autocommit(true);
    }
}else{
    $mostrarTodosLosConciertos = mostrarTodosLosConciertos($dbh);
    

}


require_once('templateConcierto.php');
?>