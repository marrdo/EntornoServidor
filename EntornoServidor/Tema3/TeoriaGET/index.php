<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetodoGET</title>
</head>
<body>
    <h1>MetodoGet</h1>
    <?php 
    $variable_para_seralizar=array("nombre"=>"Juan","Perez");
    echo "<pre>";
    print_r($variable_para_seralizar);
    ?>
    <form action="tu_archivo_php.php" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
    
        <label for="texto1">Texto 1:</label>
        <input type="text" id="texto1" name="texto1"><br><br>
    
        <label for="texto2">Texto 2:</label>
        <input type="text" id="texto2" name="texto2"><br><br>
    
        <input type="submit" value="Enviar">
    </form>
</body>
</html>