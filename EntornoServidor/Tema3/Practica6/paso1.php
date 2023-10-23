<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $variable1_para_serializar=array(
        'campo1'=>'valor1','valor2'
    );
    ?>
    <form action="paso2.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
    
        <label for="texto1">Texto 1:</label>
        <input type="text" id="texto1" name="texto1"><br><br>
    
        <label for="texto2">Texto 2:</label>
        <input type="text" id="texto2" name="texto2"><br><br>
        <input type="hidden" name="valorParaSerializar" value="<?php echo base64_encode( serialize($variable1_para_serializar));?>">    
        <input type="submit" value="Enviar">
    </form>
</body>
</html>