<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function mostrar($form = array()){
    $output = '';
    foreach($form as $linea){
        $output .= $linea;
    }

    return $output;
}