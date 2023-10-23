<?php
//Libreeria de php domdocument mirar.
//filegetcontent fileputcontent, mirar las de csv, alomejor valen las del principio.

function get_pokemons_from_csv()
{
    $pokemons=[];
    $csv = fopen('Pokemons.csv' , 'r');
    
    while (($line = fgetcsv($csv)) !== FALSE) {
        $pokemons[$line[0]]=$line;
        
    }

    fclose($csv);
    return $pokemons;
}

function write_position_csv($pokemons_selected = array())
{

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
/**Con esta funcion añadiremos la posicion a los pokemon selecccionados, ya que en el array de pokemon 
 * no tienen creado el campo posicion.
 * Para asignarles la posicion, crearemos un csv, con los campos id,position y position sera un numero
 * aleatorio entre 1 y NUMERO_POSICIONES. 
 * despues los valores de position se asiganaran a los pokemon a traves de un array o del mismo csv
 * */ 
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

    $keys_selected = array_flip($keys_selected);
    /*Se utiliza array_intersect_key($pokemons, $keys_selected) para crear un nuevo array 
      llamado $pokemons_selected. Este nuevo array contendrá solo los elementos del array
       $pokemons cuyas claves coinciden con las claves seleccionadas aleatoriamente 
       en $keys_selected*/
    $pokemons_selected = array_intersect_key($pokemons, $keys_selected);

    /*se vuelve a utilizar array_flip($keys_selected) para invertir nuevamente el array
       $keys_selected. Esto restaura el array  a su forma original, con
        las claves originales.*/
    //$keys_selected = array_flip($keys_selected);

    //En la variable $pokemonselected añadiremos la funcion get_position(),



    $pokemons_selected = get_position($pokemons_selected, $number);

    write_position_csv($pokemons_selected);

    return $pokemons_selected;
  }
}




function genera_estadio_markup($pokemons_a_pintar)
{

  $output = '<div class="estadio_container">';
  
  for($i=1 ; $i<=sqrt(NUMERO_POSICIONES); $i++){
    //Nueva fila
    $output .= '<div class="row" id="row-'.$i.'">';
    for($j=1 ; $j<=sqrt(NUMERO_POSICIONES); $j++){
      
      $posicion = (($i-1)*(sqrt(NUMERO_POSICIONES)))+$j;
      $output .= '<div class="column" id="posicion-'.$posicion.'">';
      
      $pokemon_filtrado = array_filter($pokemons_a_pintar, function($pokemon) use ($posicion){
        if($pokemon[5] == $posicion){
          
          
          return true;
        }
        return false;
      });
      
      if(!empty($pokemon_filtrado)){
        $pokemon=reset($pokemon_filtrado); // Obtenemos el primer Pokémon
        //Pintamos al bicho
        $output .= '<img src="'.$pokemon[4].'">';
      }

      $output .= '</div><!--/#posicion-'.$posicion.'-->';

    }
    $output .= '</div><!--/#row-'.$i.'-->';
  }
  $output .= '</div> <!--/.estadio_container-->';

  return $output;
}


function btn_delete_csv(){
  $output='<form action="index.php" method="post">';
  $output.='<input type="submit" name="delete" value="Reiniciar">';
  $output.='</form>';
  return $output;
}

function btn_refresh(){
  $output='<form action="index.php" method="post">';
  $output.='<input type="submit" name="refresh" value="Generar datos">';
  $output.='</form>';
  return $output;

}

?>