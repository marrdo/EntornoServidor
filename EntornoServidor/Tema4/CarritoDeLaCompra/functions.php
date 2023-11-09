<?php 

function validarUsuario($username, $userPassword, $arrValidUser){

    foreach($arrValidUser as $nombre => $password){

        if(($username === $nombre) && ($userPassword === $password)){
            return true;
        }
    }

    return false;

}


function mostrarLogin($arr = array()){
    $output = "";
    
    foreach($arr as $linea){
        $output .= $linea;
    }

    return $output;
}
?>

