<?php

/** 
 * Recorremos el arrValidUser Para comprobar si 
 * el usuario a introducido los valores correctos en los campos
 * de input proporcionados por el login.
 */
function validarUsuario($username, $userPassword, $arrValidUser)
{

    foreach ($arrValidUser as $nombre => $password) {

        if (($username === $nombre) && ($userPassword === $password)) {
            return true;
        }
    }

    return false;
}

/** 
 * Recorremos el arrForm para mostrar el array 
 * que contiene el login de registro.
 */
function mostrarLogin($arr = array())
{
    $output = "<h2>Seccion de Logeo Leffe</h2>";

    foreach ($arr as $linea) {
        $output .= $linea;
    }

    return $output;
}

/**
 * Mostramos la tienda recorriendo el array de productos
 */
function mostrarTienda($productos = array())
{
    $output = '<h2>Seleccin de productos</h2>';
    $output .= '<form action="tienda.php" method="POST" enctype="multipart/form-data" class="formTienda">';
    $output .= '<fieldset class="fildForm">';
    $output .= '<legend>Productos</legend>';
    $output .= '<div class="productos">';
    foreach ($productos as $producto) {
        $output .= '<div >';
        $output .= '<figure class="imgCerveza"><img src="asset/img/'.$producto['nombre'].'.png" alt="Imagen de cerveza" loading="lazy"><figcaption>'.$producto['nombre'].'</figcaption></figure>';
        $output .= '<p class="seleccionarCantidad"><input type="button" id="rmProduct" value="-" class="btn circle">
        <label for="' . $producto['id'] . '"> ' . ucfirst($producto['nombre']) . ': <input type="number" name="cantidades[]" id="' . $producto['id'] . '" value="' . $producto['cantidad'] . '"> </label>
        <input type="button" id="addProduct" value="+" class="btn circle">
        </p>';
        $output .= '</div>';
    }
    $output .= '</div>';
    $output .= '</fieldset>';
    $output .= '<div class="botones">';
    $output .= '<input type="submit" name="addProduct" value="Añadir al carrito" class="btn"><br>';
    $output .= '<input type="submit" name="verCarro" value="Ver el carrito" class="btn">';
    $output .= '</div>';
    $output .= '</form>';

    return $output;
}

function llenarCarro($cantidades = array(), $productos = array())
{
    $carrito = array();

    /**
     * LLenamos el carro con todos los productos para poder 
     * manipularlo en carrito.
     */
    foreach ($productos as $key => $producto) {
        $carrito[] = $producto;
    }

    /**Vamos a actualizar el carro con las cantidades que 
     * introdujo el usuario 
     */
    foreach ($carrito as $key => $producto) {
        $carrito[$key]['cantidad'] = $cantidades[$key];
    }
    return $carrito;
}

/**
 * Devolvemos una variable concatenada para sacar el formulario del carrito y 
 * el muestreo de datos.
 */
function mostrarCarrito($carrito = array())
{

    $flag = false;
    $output ='<div class="formCarro">';
    $output .= "<h2>Carrito de cervezas</h2>";
    $output .= '<form action="carrito.php" method="POST" enctype="multipart/form-data">';
    $output .= '<fieldset class="fieldCarro">';
    $output .= '<legend>Productos</legend>';
    /**Comprobar cantidad dentro del bucle */
    foreach ($carrito as $key => $datosBirra) {
        $cantidadBirra = $datosBirra['cantidad'];
        $precioBirra = $datosBirra['precio'];

        if ($cantidadBirra > 0) {
            $flag = true;
            $output .= '<p><input type="submit" name="restaBirra' . $carrito[$key]['id'] . '" value="-" class="btn circle">
            <label for="' . $carrito[$key]['id'] . '">' . $carrito[$key]['nombre'] . ': <input type="number" id="' . $carrito[$key]['id'] . '" name="cantidades[]" value="' . $carrito[$key]['cantidad'] . '"></label>
            <input type="submit" name="sumaBirra' . $carrito[$key]['id'] . '" value="+" class="btn circle">
            <input type="submit" name="borrarProducto' . $carrito[$key]['id'] . '" value="Borrar toda la cantidad" class="btn"></p>';
        }
    }
    if (!$flag) {
        $output .= '<p>No hay productos seleccionados</p>';
    }
    $output .= '</fieldset>';
    $output .= '<div class="botones">';
    $output .= '<input type="submit" name="borrarProductos" value="Borrar todos los productos" class="btn"><br>';
    $output .= '<input type="submit" name="irTienda" value="Volver a la tienda" class="btn">';
    $output .= '</div>';
    $output .= '</form>';
    $output .= '</div>';
    if ($flag) {
        $precioTotalBirras = 0;
        $output .= '<table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Precio total</th>
                            </tr>
                            </thead>';
        $output .= '<tbody>';
        foreach ($carrito as $key => $datosBirra) {
            $cantidadBirra = $datosBirra['cantidad'];
            $precioBirra = $datosBirra['precio'];
            $nombreBirra = $datosBirra['nombre'];
            $precioParcialBirras = $cantidadBirra * $precioBirra;
            $precioTotalBirras = $precioParcialBirras + $precioTotalBirras;
            if ($cantidadBirra > 0) {
                $output .= '<tr>
                                <td>'.$nombreBirra.'</td>
                                <td>'.$precioBirra.'€</td>
                                <td>'.$precioParcialBirras.'€</td>
                            </tr>';
            }
        }
        $output .= '</tbody>';
        $output .= '<tfoot>
                        <tr>
                            <td colspan="2">Precio total de la compra</td>
                            <td class="precio">'.$precioTotalBirras.'€</td>
                        </tr>
                    </tfoot>';
                    $output .= '</table>';
    }

    return $output;
}
