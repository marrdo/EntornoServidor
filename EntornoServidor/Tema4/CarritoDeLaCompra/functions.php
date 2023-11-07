<?php 

function mostrarLogin($arr = array()){
    $output = "";
    
    foreach($arr as $linea){
        $output .= $linea;
    }

    return $output;
}
?>

