<?php

require_once('functions.php');

$productos = array(
    array(
        'id' => 1,
        "nombre" => "Leffe blonde",
        "precio" => 2.30,
        'cantidad' => 0,
    ),
    array (
        'id' => 2,
        "nombre" => "Leffe Brunne",
        "precio" => 1.80,
        'cantidad' => 0,
    ),
    array(
        'id' => 3,
        "nombre" => "Leffe Rituel 9",
        "precio" => 2.10,
        'cantidad' => 0,
    )
);

$arrForm = array(
    'login' => array(
        '<form action="login.php" method="POST" enctype="multipart/form-data">',
        '<label for="nombre">Nombre:<input type="text" id="nombre" name="userName"></label>',
        '<label for="pass">Contraseña:<input type="password" id="pass" name="userPassword"></label>',
        '<input type="submit" name="enviarDatos" value="Entrar" class="btn">',
        '</form>',
    ),
);

$arrValidUser = array(
    'admin' => '1234',
    'manuel' => 'manuel',
    'root' => 'root',
    'javascript' => 'suspenso',
    'user' => 'hola',
    'illo' => 'tusabrasporque'
);

$carrito = array();
$cantidades=array();