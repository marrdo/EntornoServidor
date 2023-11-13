<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require('functions.php');
require('functions_combat.php');
/** 
 * Debugger
 */
// echo '<pre>';
// echo '<p>Array POST</p>';
// print_r($_POST);
// echo '</pre>';

$pokemonSelectUser = array();
$pokemonsAtacan = array();

$pokemonSelectPc = array();
$pokemonsDefienden = array();

/*
Si esta establecido submit, recogemos todos los datos en arrays.
*/
if (isset($_POST['submit'])) {

    foreach($_POST['pokemons_Pc'] as $clave=>$idpokemon){
        $pokemonsDefienden[$idpokemon]=$idpokemon;
    }

    foreach($_POST['pokemons_User'] as $clave=>$idpokemon){
        $pokemonsAtacan[$idpokemon]=$idpokemon;
    }

    foreach ($_SESSION['pokUser'] as $pokemon) {
        $pokemonSelectUser[$pokemon['id']] = $pokemon;
    }

    foreach ($_SESSION['pokPC'] as $pokemon) {
        $pokemonSelectPc[$pokemon['id']] = $pokemon;
    }
}
//Unimos los arrays de los que mandan el c y el usuario, y los pokemons que recibimos por sesion.
$pokemonPc = array_replace($pokemonsDefienden, $pokemonSelectPc);
$pokemonsUser = array_replace($pokemonsAtacan,$pokemonSelectUser);

//Reindexamos los valores a 0,1,2,3. Esto nos permitira selecciona para el combate.
$pokemonPc = array_values($pokemonPc);
$pokemonsUser = array_values($pokemonsUser);

$pokemonsGanadores = fight($pokemonPc, $pokemonsUser);





// echo '<pre>';
// echo 'Pokemons ganadores<br>';
// print_r($pokemonsGanadores);
// echo 'Pokemons Usuario<br>';
// print_r($pokemonsUser);
// echo 'Pokemons PC<br>';
// print_r($pokemonSelectPc);
// echo 'Pokemons Usuario<br>';
// print_r($pokemonSelectUser);
// echo '</pre>';
require_once('template.php');
