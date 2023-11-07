<?php 

$arrForm =array (
    'login'=> array(
        '<form action="tienda.php" method="POST" enctype="multipart/form-data">',
        '<label for="nombre">Nombre:</label>',
        '<input type="text" id="nombre" name="userName"><br><br>',
        '<label for="pass">Contraseña:</label>',
        '<input type="password" id="pass" name="userPassword"><br><br>',
        '<input type="submit" name="enviarDatos" value="Enviar">',
        '</form>'
    )
    );

?>
