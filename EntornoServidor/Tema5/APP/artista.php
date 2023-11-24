<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('db_config.php');
require_once('var.php');
require_once('functions.php');
require_once('functions_print.php');
//debugger
echo '<pre>';
echo '<br>';
print_r($_POST);
echo '</pre>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['actualizar'])){
        //Encuentro la id del cantante por el valor de actualizar.
        $idCantante = $_POST['actualizar'];
        //Encuentro al cantante en el array $_POST y extraigo sus datos
        $cantante = encontrarCantante($_POST,$idCantante);
        //Actualizo mediante funcion los datos del cantante
        $query = 'UPDATE cantantes SET nombre="'.$cantante[0].'", genero="'.$cantante[1].'", fecha_nacimiento="'.$cantante[2].'", precio_bolo="'.$cantante[3].'", localidad_nacimiento="'.$cantante[4].'" WHERE id="'.$idCantante.'"';
        
        $actualizado = actualizar($query,$dbh);
        //Comprobamos si se actualizó y si es asi lo mostramos por pantalla.
        if($actualizado) $actualizado=mostraractualizacion($cantante[0]);

    }
    else if(isset($_POST['borrar'])){
        //Encuentro la id del cantante por el valor de actualizar.
        $idCantante = $_POST['borrar'];
        //Encuentro al cantante en el array $_POST y extraigo sus datos
        $cantante = encontrarCantante($_POST,$idCantante);
        //Actualizo mediante funcion los datos del cantante
        $query ='DELETE FROM cantantes WHERE id="'.$idCantante.'"';
        $borrado = borrarCantante($query,$dbh);

        if($borrado) $borrado = mostrarBorrado($cantante[0]);
    }else if(isset($_POST['incorporar'])){
        $nombre = $_POST['nombre'];
        $genero = $_POST['genero'];
        $fechNacimiento = $_POST['fechNacimiento'];
        $precio_bolo = $_POST['precioBolo'];
        $localidad = $_POST['localidad'];

        $query = 'INSERT INTO cantantes (nombre,genero,fecha_nacimiento,precio_bolo,localidad_nacimiento) 
        VALUES ('.$nombre.','.$genero.','.$fechNacimiento.','.$precio_bolo.','.$localidad.')';

        

    }
}

/*Esta query con el result esta aqui debajo para que cuando recargue 
lo ultimo que vuelva a leer sea la tabla actualizada*/
$query = 'SELECT * FROM cantantes';

$results = $dbh->query($query);

$mostrarCantantes = cargarDatos($results);

require_once('template.php');
?>