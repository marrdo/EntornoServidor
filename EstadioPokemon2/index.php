<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('functions.php');
//Estos están escogidos sin leer el csv.Directamente de la API.
$arrayPokemonsAleatorios = get_pokemons_for_csv();
//Pasamos los pokemons aleatorios al csv para leerlos.
write_pokemon_in_CSV($arrayPokemonsAleatorios);
//Vamos a leer el csv para cogerlos.
$pokemonsCSV = get_pokemons_from_csv();


//Usuario elige pokemons
$pintarCheckBoxes = creacion_de_checks($pokemonsCSV);
//Seleccion de pokemons de la maquina. Al ser dificil pasarlos al siguiente archivo lo generare con la misma funcion en el siguiente archivo.
//$pokemonsMaquina = get_pokemons_computer($pokemonsCSV);



require_once('template.php');
?>