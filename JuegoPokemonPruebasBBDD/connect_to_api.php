<?php 

//Para conectarnos a la api y solicitarle la info de un pokemon necesitamos un numero de id del pokemon.
//Para eso creamos una funcion que nos devuelva el numero de id del pokemon.

function get_info_pokemon($id=1){
    //Conexion a la api
    $api=curl_init("https://pokeapi.co/api/v2/pokemon/".$id."/");
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    $response=curl_exec($api);
    curl_close($api);

    $json=json_decode($response);
    $pokemon=array();

    $pokemon["id"]=$json->id;
    $pokemon["name"]=$json->name;
    $pokemon["type"]=$json->types[0]->type->name;
    $pokemon["hp"]=$json->stats[0]->base_stat;
    $pokemon["attack"]=$json->stats[1]->base_stat;
    $pokemon["defense"]=$json->stats[2]->base_stat;
    $pokemon["special-attack"]=$json->stats[3]->base_stat;
    $pokemon["special-defense"]=$json->stats[4]->base_stat;
    $pokemon["speed"]=$json->stats[5]->base_stat;    
    $pokemon["sprite"]=$json->sprites->front_default;
    $pokemon["sprite-shiny"]=$json->sprites->front_shiny;

    return $pokemon;
}

?>