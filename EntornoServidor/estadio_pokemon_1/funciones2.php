<?php
//Libreeria de php domdocument mirar.
//filegetcontent fileputcontent, mirar las de csv, alomejor valen las del principio.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Funciona
function get_pokemons_from_csv()
{
  $pokemons = [];
  $csv = fopen('Pokemons.csv', 'r');

  while (($line = fgetcsv($csv)) !== FALSE) {
    $pokemons[$line[0]] = $line;
  }

  fclose($csv);
  return $pokemons;
}

function write_position_csv($pokemons_selected = array())
{
  echo 'Hemos entrado en write_position_csv';
  echo '<pre>';
  print_r($pokemons_selected);
  echo '</pre>';

  if (isset($pokemons_selected) && !empty($pokemons_selected)) {
    if (file_exists('posiciones.csv')) {
      echo 'Existe el archivo, vamos a sobreescribirlo.<br>';
      $csv = fopen('posiciones.csv', 'a');
      if ($csv) {
        foreach ($pokemons_selected as $pokemon) {
          $camposCSV=[$pokemon[0],$pokemon[5]];
          fputcsv($csv, $camposCSV, ',');
        }
      } else {
        echo 'No se pudo abrir el archivo';
      }
    } else {
      echo 'No existe el archivo, vamos a crearlo.';
      $csv = fopen('posiciones.csv', 'w');
      if ($csv) {
        foreach ($pokemons_selected as $pokemon) {
          $camposCSV=[$pokemon[0],$pokemon[5]];
          fputcsv($csv, $camposCSV, ',');
        }
      } else {
        echo 'No se pudo abrir el archivo';
      }
    }
  }
}

//Funciona
function get_position($pokemons_selected = array(), $number = 0)
{

  $verificarPosicion = [];
  for ($i = 0; $i < $number; $i++) {

    do {
      $posicion = rand(1, 36);
    } while (in_array($posicion, $verificarPosicion));

    $verificarPosicion[$i] = $posicion;
  }

  //Ya tenemos dos posiciones aleatorias que no se repiten.
  /**
   * Vamos a almacenar la posicion en el array de pokemons_selected
   */
  $vuelta = 0;
  foreach ($pokemons_selected as $key => $pokemon) {

    $pokemons_selected[$key][] = $verificarPosicion[$vuelta];

    $vuelta++;
  }

  return $pokemons_selected;
}

//Funciona
function get_pokemons_and_positions($pokemons = null, $number = 0)
{

  if ($pokemons === null) {
    $pokemons = get_pokemons_from_csv();
  }
  if ($number === 0) {
    $number = 2;
  }

  //Verifica si la variable $pokemons está definida y no está vacía con isset($pokemons) && !empty($pokemons)
  if (isset($pokemons) && !empty($pokemons)) {
    //array_rand($pokemons, $number)se utiliza para seleccionar de manera aleatoria $number 
    //(en nuestro caso 2 porkemons)claves (índices) del array $pokemons.
    // Estas claves seleccionadas se almacenan en el array $keys_selected.
    $keys_selected = array_rand($pokemons, $number);
    /* se invierte el arreglo $keys_selected usando array_flip($keys_selected). 
      Esto cambia las claves seleccionadas en valores y los valores en claves. 
      Esto se hace para facilitar la siguiente operación.*/
    //echo '<pre>Estamos en array rand <br>';
    //print_r($keys_selected);
    //echo '</pre>';
    $keys_selected = array_flip($keys_selected);
    //echo '<pre>Estamos en array flip primer cabmio de claves <br>';
    //print_r($keys_selected);
    //echo '</pre>';
    /*Se utiliza array_intersect_key($pokemons, $keys_selected) para crear un nuevo array 
      llamado $pokemons_selected. Este nuevo array contendrá solo los elementos del array
       $pokemons cuyas claves coinciden con las claves seleccionadas aleatoriamente 
       en $keys_selected*/
    $pokemons_selected = array_intersect_key($pokemons, $keys_selected);
    //echo '<pre>Estamos en POKEMONSELECTED <br>';
    //print_r($pokemons_selected);
    //echo '</pre>';




    /*se vuelve a utilizar array_flip($keys_selected) para invertir nuevamente el array
       $keys_selected. Esto restaura el array  a su forma original, con
        las claves originales.*/
    //$keys_selected = array_flip($keys_selected);
    //echo '<pre>Estamos en array flip2 mostramos keyselected<br>';
    //print_r($keys_selected);
    //echo '</pre>';

    //En la variable $pokemonselected añadiremos la funcion get_position(),



    $pokemons_selected = get_position($pokemons_selected, $number);

    write_position_csv($pokemons_selected);

    return $pokemons_selected;
  }
}

function btn_delete_csv(){
  $output='<form action="index.php" method="post">';
  $output.='<input type="submit" name="delete" value="'.unlink("posiciones.csv").'">';
  $output.='</form>';
}

get_pokemons_and_positions();
