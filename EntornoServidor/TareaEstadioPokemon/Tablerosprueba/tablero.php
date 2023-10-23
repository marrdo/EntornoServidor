<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadio Pokemon</title>
    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">
</head>
<body>
    <h1>Estadio Pokemon</h1>

<table>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Include con el array de pokemons.
    include 'pokemons.php';
    


    
    //Usamos shuffle para mezclar los pokemon y ponerlos de forma aleatoria
    shuffle($pokemons);
    
    //Generamos la tabla con 4 pokemons aleatorios printeando primero las filas
    for ($i = 0; $i < 4; $i++) {
        echo "<tr>";
    
        //Seleccionamos un pokemon aleatorio del array por cada vuelta que de el bucle for
        $pokemonSeleccionado = $pokemons[$i];
    
        // Abrimos las celdas, y y vamos mostrando los datos de los pokemons
        echo "<td><img src='".$pokemonSeleccionado['img']."'></td>";
        echo "<td>Nombre: ".$pokemonSeleccionado['name']."</td>";
        echo "<td>ID: ".$pokemonSeleccionado['id']."</td>";
        echo "<td>Tipo: ".$pokemonSeleccionado['type']."</td>";
    
        echo "</tr>";
    }
    
    ?>
</table>
</body>
</html>


