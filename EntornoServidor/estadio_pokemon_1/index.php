<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('vars.php');
require_once('funciones.php');

if (isset($_POST['delete'])) {
    if (unlink("posiciones.csv")) {
      echo "El archivo 'posiciones.csv' ha sido eliminado.";
    } else {
      echo "Error al eliminar el archivo 'posiciones.csv'.";
    }
  }
$content = "<h1> Esperando accion</h1>";
if(isset($_POST['refresh'])){
    //Vamos a generar el array en la variable pokemones a traves del archivo csv.
$pokemones = get_pokemons_from_csv();
//Pro primer parametro pasabamos pokemones
$pokemons_con_posiciones = get_pokemons_and_positions($pokemones,2);

$content = genera_estadio_markup($pokemons_con_posiciones);
}



//Procesado

$btnRefrescar=btn_refresh();
$btnBorrar=btn_delete_csv();
require_once('template.php');

?>