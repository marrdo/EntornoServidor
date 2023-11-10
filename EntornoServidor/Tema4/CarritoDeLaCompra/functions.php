<?php

function validarUsuario($username, $userPassword, $arrValidUser)
{

    foreach ($arrValidUser as $nombre => $password) {

        if (($username === $nombre) && ($userPassword === $password)) {
            return true;
        }
    }

    return false;
}

function recuperarProductos($productos = array())
{

    $output = "";
    foreach ($productos as $producto) {
        $output .= '<input type="button" value="-"><label for="' . $producto . '">' . ucfirst($producto) . '<input type="number" name="cantidadDeProducto" id="' . $producto . '"></label><input type="button" value="+"><span>Precio por unidad:' . $producto[1] . '</span>';
    }
    return $output;
}

function mostrarLogin($arr = array())
{
    $output = "";

    foreach ($arr as $linea) {
        $output .= $linea;
    }

    return $output;
}

function mostrarTienda($productos = array())
{
    $output = '<h1>Tienda de Birras</h1>';
    $output .= '<form action="tienda.php" method="POST" enctype="multipart/form-data">';
    $output .= '<fieldset>';
    $output .= '<legend>Productos</legend>';
    foreach ($productos as $producto) {
        $output .= '<p><input type="button" id="rmProduct" value="-"><label for="' . $producto['id'] . '"> ' . ucfirst($producto['nombre']) . ': <input type="number" name="' . $producto['id'] . '" id="' . $producto['id'] . '" value="'.$producto['cantidad'].'"> </label><input type="button" id="addProduct" value="+"><label>   El precio por unidad es: <span>' . $producto['precio'] . '</span> </label></p>';
    }
    $output .= '</fieldset>';
    $output .= '<input type="submit" name="addProduct" value="Añadir al carrito"><br>';
    $output .= '<input type="submit" name="verCarro" value="Ver el carrito">';
    $output .= '</form>';

    return $output;
}

function llenarCarro($cantidad1=0,$cantidad2=0,$cantidad3=0,$productos){
    
    for($i=0;$i<count($productos);$i++){
        if(($i+1)==$productos[$i]['id']){
            echo $productos[$i]['nombre'];
        }
    }
}