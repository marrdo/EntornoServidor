<?php

require("connect_to_api.php");

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

function write_pokemon_in_CSV($pokemonData=array())
{
    $archivoCSV = 'CSVs/pokemonAleatorios.csv';
    
    /**Eliminamos el archivo si existe, si no lo creamos y sobreescribimos. */
    if (file_exists($archivoCSV)) {
        if (unlink($archivoCSV)) {
            echo "El archivo pokemonAleatorios se ha eliminado correctamente.<br>";
        } else {
            echo "No se pudo eliminar el archivo pokemonAleatorios.<br>";
        }
    }
    $csvFile = fopen($archivoCSV, 'w');

    foreach ($pokemonData as $pokemon) {

        fputcsv($csvFile, $pokemon);
    }

    fclose($csvFile);
    echo "El archivo pokemonAleatorios se ha creado correctamente.<br>";
}

function get_pokemons_from_csv(){
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

function creacion_de_checks($pokemonsCSV)
{
    $content='<form action="duelo.php" method="post">';
    $content.='<h2>Selecciona 4 pokemons</h2>';
    $content.='<ul>';
    foreach($pokemonsCSV as $pokemon){
        $content.='<li><label><span>' . $pokemon['name'] . '</span><input type="checkbox" name="pokemon[]" value="' . $pokemon['id'] . '"></label></li>';
    }
    $content.='</ul>';
    $content.='<input type="submit" value="Redi pa las tortas">';

    $content.='</form>';

    return $content;
}

function get_pokemons_computer($pokemonsCSV=array())
{
    shuffle($pokemonsCSV);
    $pokemonsComputer = array();
    for($i=0;$i<4;$i++){
        $pokemonsComputer[]=$pokemonsCSV[$i];
    }
    return $pokemonsComputer;
}