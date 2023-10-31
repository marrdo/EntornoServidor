<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('functions.php');

 /** 
  * Debugger
  */
 echo '<pre>';
 print_r($_POST);
 echo '</pre>';

if(isset($_POST['submit'])){


    $pokemonSelectUser=$_POST['pokemons_User'];
    $pokemonSelectPc=$_POST['pokemons_Pc'];

    echo '<pre>';
    echo 'Sesion<br>';
    print_r($_SESSION);
    echo 'nada<br>';
    print_r($pokemonSelectUser);
    echo '</pre>';
}







//  Array
//  (
//      [pokemons_User] => Array
//          (
//              [0] => 190
//              [1] => 427
//              [2] => 424
//              [3] => 840
//          )
 
//      [pokemons_Pc] => Array
//          (
//              [0] => 701
//              [1] => 103
//              [2] => 283
//              [3] => 426
//          )
 
//      [submit] => Comienza el combate
//  )





require_once('template.php');

?>