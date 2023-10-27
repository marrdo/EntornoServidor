<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('function.php');
require_once('functions_print.php');
require_once('var.php');

/*Debugger*/ 
// echo '<pre>';
//     print_r($formulario);
//     echo '</pre>';

if(!isset($_SESSION) && (empty($_SESSION))){
    $_SESSION['paso']=1;
    $paso=$_SESSION['paso'];
    
    $pintar_formulario=draw_form($formulario,$paso);
}else{

}


require_once('template.php');
?>