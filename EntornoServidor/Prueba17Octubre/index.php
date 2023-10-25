<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vars.php');
require_once('functions.php');

$videoJuegosSinfiltrar = $videojuegos;




//$videojuegosFiltrados=filtrarVideojuegos($videojuegosSinfiltrar);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Video juegos a filtrar</h1><br>
        <form action="procesar.php" method="POST" enctype="multipart/form-data">
            <?php $abecedarioCheck = generar_abecedario_con_check();  ?>

            <input type="submit" value="Filtrar" name="filtrar">
        </form>

    </header>

    <table>
        <tr>
            <th>Nombre</th>
            <th>creador</th>
            <th>fecha</th>
        </tr>
        <?php $mostrarVideoJuegos = mostrarJuegos($videoJuegosSinfiltrar); ?>
    </table>

</body>

</html>