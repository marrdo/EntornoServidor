<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require('functions.php');
$pokemonsCSV = get_pokemons_from_csv();
$pokemonsPC = get_pokemons_computer($pokemonsCSV);

if (isset($_POST['submit'])) {
    $pokemonPost = $_POST['pokemon'];
    $pokemonsUser = search_pokemon($pokemonsCSV, $pokemonPost);
}

//Posiciones
$posicionUser = take_positions();
$posicionPC = take_positions_pc($posicionUser);

//Asignacion de posiciones
$pokemonsUser = assign_positions($pokemonsUser, $posicionUser);
$pokemonsPC = assign_positions($pokemonsPC, $posicionPC);

//Generamos las cartas de informacion.
$generarCartas=generarCartas($pokemonsUser,$pokemonsPC);

//Generamos el estadio
$generarTablero=estadio_Pokemon($pokemonsUser,$pokemonsPC);

//Generamos los Select para elegir los pokemons que van a pelear.
$botonesPelea=seleccion_de_luchadores($pokemonsUser,$pokemonsPC);

$_SESSION['pokUser'] = $pokemonsUser;
$_SESSION['pokPC'] = $pokemonsPC;

//  /** 
//   * Debugger
//   */
//  echo '<pre>';
//  print_r($pokemonsUser);
//  print_r($pokemonsPC);
//  echo '</pre>';

require_once('template.php');
