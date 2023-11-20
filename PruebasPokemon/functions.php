<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function pintar($login = array())
{

    $output = '';

    foreach ($login as $linea) {
        $output .= $linea;
    }

    return $output;
}
