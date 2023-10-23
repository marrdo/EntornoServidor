<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('functions.php');
$pokemonsCSV=get_pokemons_from_csv();
$pokemonsPC=get_pokemons_computer($pokemonsCSV);


/** 
 * Debugger
 */
echo '<pre>';
print_r($_POST);
echo '</pre>';

require_once('template.php');

?>