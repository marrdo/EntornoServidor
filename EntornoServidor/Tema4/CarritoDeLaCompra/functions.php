<?php 

function validarUsuario($username, $userPassword, $arrValidUser){

    foreach($arrValidUser as $nombre => $password){

        if(($username === $nombre) && ($userPassword === $password)){
            return true;
        }
    }

    return false;

}

function recuperarProductos($productos=array()){

    $output = "";
    foreach($productos as $producto){
        $output .= '<input type="button" value="-"><label for="'.$producto.'">'.ucfirst($producto).'<input type="number" name="cantidadDeProducto" id="'.$producto.'"></label><input type="button" value="+"><span>Precio por unidad:'.$producto[1].'</span>';
    }
    return $output;
}

function mostrarLogin($arr = array()){
    $output = "";
    
    foreach($arr as $linea){
        $output .= $linea;
    }

    return $output;
}
?>
