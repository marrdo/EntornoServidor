<?php 

function draw_form($formulario,$paso){

    $content='';

    foreach($formulario as $seccion){
        if($paso === $seccion){
            foreach($seccion as $frase){
                $content .= $frase;
            }
        }
    }

    return $content;
}

?>