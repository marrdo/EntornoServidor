<?php
include 'pokemons.php';
/*Barajamos el array de pokemons */
shuffle($pokemons);

/*Creamos el array de pokemons*/
$pokemosElegidos = array();
/* Seleccionamos 4 pokemons aleatorios*/
for ($i = 0; $i < 4; $i++) {
    $pokemonsElegidos[$i] = $pokemons[$i];
    $pokemonsElegidos[$i]['posicion'][0]=rand(1,5);
    $pokemonsElegidos[$i]['posicion'][1]=rand(1,5);
}


/*Comprobamos que las posiciones de los pokemons no sean iguales*/
for ($i = 0; $i < 4; $i++) {

    /* Seleccionamos la fila y la columna del pokemon*/
    $fila = $pokemonsElegidos[$i]['posicion'][0];
    $columna = $pokemonsElegidos[$i]['posicion'][1];

    /*Con esto seleccionamos otro pokemon del array de pokemons elegidos*/
    for ($j = 0; $j < 4; $j++) {

        /*Seleccionamos la fila del segundo pokemon */
        $fila2 = $pokemonsElegidos[$j]['posicion'][0];
        $columna2 = $pokemonsElegidos[$j]['posicion'][1];

        /*Si el pokemon es distinto, ($i distinto de $j), comprobamos que la fila y la columna
            no sean iguales, pero si lo son, entramos en bucle*/
        if (($i != $j) && ($fila == $fila2) && ($columna == $columna2)) {
            /*Si pasa esto, entramos en un bucle, hasta que la posicion 
                de la columna y la fila de los pokemons sea distinta*/
            do {
                $pokemonsElegidos[$j]['posicion'][0] = rand(1, 5);
                $pokemonsElegidos[$j]['posicion'][1] = rand(1, 5);
            } while (($fila == $fila2) && ($columna == $columna2));
        }
    }
}

/*Cuando acaba este bucle for, nuestro array de pokemonsElegidos tiene 4 pokemons
    con una posicion distinta cada uno.*/

/*Ahora que ya tenemos los pokemons con posiciones distintas los unos de los otros
    vamos a printearlos en una tabla html que servirá de tablero.*/


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadio Pokemon</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="contenedor">
        <div class="pokeball1"><img src="Pokeballroja.png" alt="Icono de un pokemon"></div>
        <div class="pokeball2"><img src="Pokeballroja.png" alt="Icono de un pokemon"></div>
        <div class="pokeball3"><img src="Pokeballroja.png" alt="Icono de un pokemon"></div>
        <div class="pokeball4"><img src="Pokeballroja.png" alt="Icono de un pokemon"></div>
        <table>
            <thead>
                <tr>
                    <th colspan="5" class="titulo">Estadio Pokemon</th>
                </tr>
            </thead>
            <tbody>
                <?php

                /*Vamos a recorrer el array del tablero que lo vamos a dibujar a 5x5*/
                /*Comenzamos dibujando las filas*/
                for ($fila = 1; $fila <= 5; $fila++) {
                    echo '<tr>';



                    /*Comenzamos a printear las columnas*/
                    for ($columna = 1; $columna <= 5; $columna++) {
                        /*Esta variable nos da el pokemon que tiene las coordenadas del array,
                    se posiciona justamente aqui, para que la variable se reinicie por cada vuelta del bucle*/
                        $pokemonPosicionado = null;
                        
                        /*Comprobamos que la fila del pokemon y la columna, coincidan con las de los bucles*/
                        foreach ($pokemonsElegidos as $pokemon) {
                            if ($pokemon['posicion'][0] == $fila && $pokemon['posicion'][1] == $columna) {
                                $pokemonPosicionado = $pokemon;
                                break;
                            }
                        }
                        /*Ya tenemos al pokemon seleccionado, ahora comprobamos si el valor es null 
                            o si hay un pokemon, si hay un pokemon lo pintamos*/
                        if ($pokemonPosicionado != null) {
                            echo '<td class="hayPokemon">';
                            echo '<img src="' . $pokemonPosicionado['img'] . '" alt="' . $pokemonPosicionado['name'] . '">';
                        }else{
                            echo '<td class="noHayPokemon">';
                        }
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Manuel Maldonado</td>
                </tr>
            </tfoot>
        </table>
        
    </div>
</body>

</html>