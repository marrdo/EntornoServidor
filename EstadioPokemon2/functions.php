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
//Generamos las cartas para ver la info de los pokemons
function generarCartas($pokemonsUser, $pokemonsPC)
{
    //Comienza div de user
    $content = '<div class="pokemon-user">';
    $content .= "<h4>Pokemon del usuario</h4>";
    foreach ($pokemonsUser as $pokemon) {
        $content .= '<div class="pokemon-card">
        <figure>
        <img class="pokemon-img" src="' . $pokemon['sprite'] . '" alt="' . $pokemon['name'] . '">
        <figcaption>' . $pokemon['name'] . '</figcaption>
        </figure>
        <p>Tipo: ' . $pokemon['type'] . '</p>
        <p>Hp: ' . $pokemon['hp'] . '</p>
        <p>Attack: ' . $pokemon['attack'] . '</p>
        </div>';
    }
    $content .= '</div>';

    //comienza div de pc
    $content .= '<div class="pokemon-pc">';
    $content .= "<h4>Pokemon del Ordenador</h4>";
    foreach ($pokemonsPC as $pokemon) {
        $content .= '<div class="pokemon-card">
        <figure>
        <img class="pokemon-img" src="' . $pokemon['sprite'] . '" alt="' . $pokemon['name'] . '">
        <figcaption>' . $pokemon['name'] . '</figcaption>
        </figure>
        <p>Tipo: ' . $pokemon['type'] . '</p>
        <p>Hp: ' . $pokemon['hp'] . '</p>
        <p>Attack: ' . $pokemon['attack'] . '</p>
        </div>';
    }
    $content .= '</div>';

    //Devolvemos la variable
    return $content;
}
//Generamos el estadios con los pokemons en sus posiciones
function estadio_Pokemon($pokemonsUser,$pokemonsPC)
{
    $pokemons_pintar=array_merge($pokemonsUser,$pokemonsPC);
    $posicion=1;
    $pintar = '<table>';

    $pintar .= '<thead><tr><th colspan="6">Estadio Pokemon</th></tr></thead>';
    $pintar .= '<tbody>';
    /*Pintar el tablero*/ 

    for ($i = 1; $i <= 6; $i++) {
        $pintar .= '<tr>';
        for ($j = 1; $j <= 6; $j++) {
    
            $pokemon = null;
            
            // Buscar el Pokémon en $pokemons_pintar con la posición actual
            $filteredPokemons = array_filter($pokemons_pintar, function($pokemon) use ($posicion) {
                return $pokemon['position'] == $posicion;
            });
    
            if (!empty($filteredPokemons)) {
                // Si se encontró un Pokémon, obtén el primero (reset)
                $pokemon = reset($filteredPokemons);
            }
    
            // Ahora puedes utilizar $pokemon para hacer algo con el Pokémon encontrado o no encontrado
            if ($pokemon) {
                $pintar .= '<td id="' . $posicion . '"><img src="' . $pokemon['sprite'] . '" alt="' . $pokemon['name'] . '"></td>';
            } else {
                $pintar .= '<td id="' . $posicion . '"></td>';
            }
    
            $posicion++;
        }
        $pintar .= '</tr>';
    }

    return $pintar;
}
//Seleccionamos los pokemons que vamos a enfrentar
function seleccion_de_luchadores($pokemonsUser,$pokemonsPC)
{
    
    $output = '<h4>Elige a quien le pegas</h4>';
    $output .= '<form action="ganadores.php" method="post">';
    //Boton de usuario
    $output .= '<div class="btnUser">';
    $output .= '<h6>Pokemons Usuario</h6>';
    for($i=0;$i<4;$i++){
        $output .= '<select name="pokemons_User[]">';
        foreach($pokemonsUser as $pokemon){
            $output .= '<option value="'.$pokemon['id'].'">'.$pokemon['name'].'</option>';
        }
        $output .= '</select>';
    }
    $output .= '</div>';
    //Boton maquina
    $output .= '<div class="btnMaquina">';
    $output .= '<h6>Pokemons Maquina</h6>';
    for($i=0;$i<4;$i++){
        $output .= '<select name="pokemons_Pc[]">';
        foreach($pokemonsPC as $pokemon){
            $output .= '<option value="'.$pokemon['id'].'">'.$pokemon['name'].'</option>';
        }
        $output .= '</select>';
    }
    $output .= '</div>';
    $output .= '<input type="submit" value="Comienza el combate" name="submit"> ';
    $output .= '</form>';

    return $output;
}