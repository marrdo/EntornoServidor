<?php 

$arrForm =array (
    'login' => array(
        '<form action="login.php" method="POST" enctype="multipart/form-data">',
        '<label for="nombre">Nombre:</label>',
        '<input type="text" id="nombre" name="userName"><br><br>',
        '<label for="pass">Contraseña:</label>',
        '<input type="password" id="pass" name="userPassword"><br><br>',
        '<input type="submit" name="enviarDatos" value="Enviar">',
        '</form>'
    ),
    'tienda' => array(
        'declaracion' => '<form action="tienda.php" method="POST" enctype="multipart/form-data">',
        'control1' => '<input type="button" value="-"/>',
        // '<form action="tienda.php" method="POST" enctype="multipart/form-data">',
        // '<input type="button" value="-"/><label for="">'..':<input type="number" name="" id=""></label><input type="button" value="+"/>',
        // '</form>'
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

    $arrProductos = array(
        'leche' => array(
            'descripcion' => 'Leche fresca de vaca',
            'precio' => 2.50,
            'stock' => 100,
        ),
        'huevos' => array(
            'descripcion' => 'Docena de huevos frescos',
            'precio' => 3.00,
            'stock' => 80,
        ),
        'pan' => array(
            'descripcion' => 'Pan integral recién horneado',
            'precio' => 2.00,
            'stock' => 120,
        ),
        'manzanas' => array(
            'descripcion' => 'Manzanas rojas frescas',
            'precio' => 1.20,
            'stock' => 150,
        ),
        'arroz' => array(
            'descripcion' => 'Arroz blanco de calidad',
            'precio' => 1.50,
            'stock' => 90,
        ),
        'pasta' => array(
            'descripcion' => 'Paquete de pasta italiana',
            'precio' => 1.80,
            'stock' => 70,
        ),
        'aceite de Oliva' => array(
            'descripcion' => 'Aceite de oliva virgen extra',
            'precio' => 4.50,
            'stock' => 60,
        ),
        'cafe' => array(
            'descripcion' => 'Café molido 100% arabica',
            'precio' => 5.00,
            'stock' => 40,
        ),
        'pollo' => array(
            'descripcion' => 'Pechugas de pollo frescas',
            'precio' => 8.00,
            'stock' => 30,
        ),
        'detergente' => array(
            'descripcion' => 'Detergente líquido para la ropa',
            'precio' => 3.50,
            'stock' => 50,
        ),
    );
    
    

?>