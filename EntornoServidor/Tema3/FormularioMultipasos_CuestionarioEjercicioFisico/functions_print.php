<?php 

function draw_form($formulario,$paso){

    $content='';

    if (isset($formulario[$paso])) {
        foreach ($formulario[$paso] as $frase) {
            $content .= $frase;
        }
    }

    return $content;
}

?>