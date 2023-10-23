<?php 

require_once('functions.php');
require_once('vars.php');


    
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';


//Si llegasen las letras

$letrasPost=$_POST['letras'];
foreach($letrasPost as $letra){
    if($letra=='on'){
        $letrasSeleccionadas[]=$letra;
    
    }
}


$arrayFiltrado=filtrarVideojuegos($videojuegos,$letrasSeleccionadas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <tr>
            <th>Nombre</th>
            <th>creador</th>
            <th>fecha</th>
        </tr>
        <?php $mostrarVideoJuegos = mostrarJuegos($arrayFiltrado); ?>
    </table>
    
</body>
</html>