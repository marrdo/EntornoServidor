<?php
define("NUMERO_POSICIONES", 36);

require("connect_to_api.php");
//Coger pokemons para el  CSV
function get_pokemons_for_csv()
{


    $noRepes = array();
    $pokemonData[0] = array('Id', 'Name', 'Type', 'Hp', 'Attack', 'Sprite');
    //Extraemos numeros aleatorios para pasarlos ahora a la funcion de obtener datos como id del pokemon.
    for ($i = 1; $i <= 20; $i++) {
        do {
            $id = rand(1, 1000);
        } while (in_array($id, $noRepes));
        /** Llegados a este punto el id no está repetido
         * Vamos a conectar con la pokeapi para acceder a la informacion.
         */
        $noRepes[] = $id;
        $pokemonData[] = get_info_pokemon($id);
    }

    return $pokemonData;
}
//Escribir pokemon en el CSV
function write_pokemon_in_CSV($pokemonData = array())
{
    $archivoCSV = 'CSVs/pokemonAleatorios.csv';

    /**Eliminamos el archivo si existe, si no lo creamos y sobreescribimos. */
    if (file_exists($archivoCSV)) {
        if (unlink($archivoCSV)) {
            /**Se borra el archivo. */
        } 
    }
    $csvFile = fopen($archivoCSV, 'w');

    foreach ($pokemonData as $pokemon) {

        fputcsv($csvFile, $pokemon);
    }

    fclose($csvFile);
    
}
//Capturar los pokemons del CSV
function get_pokemons_from_csv()
{
    //Declaracion de archivo
    $archivoCSV = 'CSVs/pokemonAleatorios.csv';

    $pokemonData = array();

    $campos = array('id', 'name', 'type', 'hp', 'attack', 'sprite');

    //Si existe entramos en faena.
    if (file_exists($archivoCSV)) {

        $csvFile = fopen($archivoCSV, 'r');
        //Saltamos encabezados
        fgetcsv($csvFile);

        /**Cogemos todos los daos del pokemon.
         * Mientras haya filas pokemon cogerá datos, en caso de que no haya saltará False y para casa.
         */
        while (($pokemon = fgetcsv($csvFile)) !== false) {

            $pokemonData[] = array_combine($campos, $pokemon);
        }

        fclose($csvFile);
    }

    return $pokemonData;
}
//Creamos los checks con los pokemons de INDEX.php
function creacion_de_checks($pokemonsCSV)
{
    $content = '<form action="duelo.php" method="post">';
    $content .= '<h2>Selecciona 4 pokemons</h2>';
    $content .= '<ul>';
    foreach ($pokemonsCSV as $pokemon) {
        $content .= '<li><label><span>' . $pokemon['name'] . '</span><input class="checks" type="checkbox" name="pokemon[]" value="' . $pokemon['id'] . '"></label></li>';
    }
    $content .= '</ul>';
    $content .= '<input type="submit" value="Redi pa las tortas" name="submit"> ';

    $content .= '</form>';

    return $content;
}
//Elegimos los pokemons del pc desde el CSV
function get_pokemons_computer($pokemonsCSV = array())
{
    shuffle($pokemonsCSV);
    $pokemonsComputer = array();
    for ($i = 0; $i < 4; $i++) {
        $pokemonsComputer[] = $pokemonsCSV[$i];
    }
    return $pokemonsComputer;
}
//Buscamos los pokemons del usuario desde el CSV en el archivo DUELO.php
function search_pokemon($pokemonsCSV, $pokemonPost)
{
    $pokemonsUser = array();
    foreach ($pokemonPost as $pokemonId) {
        $filteredPokemon = array_filter($pokemonsCSV, function ($pokemon) use ($pokemonId) {
            return $pokemon['id'] == $pokemonId;
        });
        $pokemonsUser[] = reset($filteredPokemon); // Usamos reset() para obtener el primer elemento del array.
    }

    return $pokemonsUser;
}
//Sacamos posiciones para el usuario
function take_positions()
{
    $posiciones = array();
    for ($i = 0; $i < 4; $i++) {
        do {
            $posicion = rand(1, 36);
        } while (in_array($posicion, $posiciones));
        $posiciones[] = $posicion;
    }
    return $posiciones;
}
//Sacamos posiciones para el pc
function take_positions_pc($posicionUser)
{
    $posiciones = array();
    for ($i = 0; $i < 4; $i++) {
        do {
            $posicion = rand(1, 36);
        } while (in_array($posicion, $posiciones) || in_array($posicion, $posicionUser));
        $posiciones[] = $posicion;
    }
    return $posiciones;
}
//Asignamos con una funcion posiciones para los dos jugadores.
function assign_positions($pokemons, $posicion)
{

    for ($i = 0; $i < 4; $i++) {
        $pokemons[$i]['position'] = $posicion[$i];
    }

    return $pokemons;
}

function generarCartas($pokemonsUser, $pokemonsPC)
{
    //Comienza div de user
    $content = '<div class="pokemon-user">';
    $content .= "<h2>Pokemon del usuario</h2>";
    foreach ($pokemonsUser as $pokemon) {
        $content .= '<div class="pokemon-card">
        <figure>
        <img class="pokemon-img" src="' . $pokemon['sprite'] . '" alt="' . $pokemon['name'] . '">
        <figcaption>' . $pokemon['name'] . '</figcaption>
        </figure>
        <p>Tipo: ' . $pokemon['type'] . '</p><br>
        <p>Hp: ' . $pokemon['hp'] . '</p><br>
        <p>Attack: ' . $pokemon['attack'] . '</p>
        </div>';
    }
    $content .= '</div>';

    //comienza div de pc
    $content .= '<div class="pokemon-pc">';
    $content .= "<h2>Pokemon del Ordenador</h2>";
    foreach ($pokemonsPC as $pokemon) {
        $content .= '<div class="pokemon-card">
        <figure>
        <img class="pokemon-img" src="' . $pokemon['sprite'] . '" alt="' . $pokemon['name'] . '">
        <figcaption>' . $pokemon['name'] . '</figcaption>
        </figure>
        <p>Tipo: ' . $pokemon['type'] . '</p><br>
        <p>Hp: ' . $pokemon['hp'] . '</p><br>
        <p>Attack: ' . $pokemon['attack'] . '</p>
        </div>';
    }
    $content .= '</div>';

    //Devolvemos la variable
    return $content;
}


