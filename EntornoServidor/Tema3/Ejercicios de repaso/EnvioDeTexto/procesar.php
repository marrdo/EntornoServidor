<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['enviar'])){
    echo '<pre>';
     print_r($_POST);
     echo '</pre>';
    $nombre = $_POST['nombre'];
    $texto1 = $_POST['texto1'];
    $texto2 = $_POST['texto2'];
    $check1 = $_POST['gusta1'];
    $check2 = $_POST['gusta2'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>procesar.php</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <script defer src="code.js"></script>
</head>
<body>
    <h1>Datos recibidos</h1>
    <p>El nombre recibido es: <?php echo $nombre;?></p>
    <p>El texto 1 recibido es: <?php echo $texto1;?></p>
    <p>El texto 2 recibido es: <?php echo $texto2;?></p>

    <?php
        if(($check1 == 'on') && ($check2 == 'on')){
            echo '<p>Los dos textos me gustan.</p>';
        }else if($check1 == 'on'){
            echo '<p>El texto 1 me gusta.</p>';
        
        }else{
            echo '<p>El texto 2 me gusta.</p>';
        
        
        }
    ?>
    
</body>
</html>