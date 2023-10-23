<?php 
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
    
        <label for="texto1">Texto 1:</label>
        <input type="text" id="texto1" name="texto1"><br><br>
    
        <label for="texto2">Texto 2:</label>
        <input type="text" id="texto2" name="texto2"><br><br>
    
        <input type="submit" name="enviar1" value="enviar">
    </form>    
</body>
</html>

<?php 
    if(isset($_POST['enviar1'])){
        $variable1= base64_encode(serialize($_POST["nombre"]."<br>".$_POST["texto1"]."<br>".$_POST["texto2"]));
        
        echo '<pre>';
        echo $variable1;
        echo '</pre>';
        echo '<br>';
        if(isset($_POST['enviar1'])){
            echo "Segundo Paso<br><br>";
            echo "<label for=\"nombre\">Nombre:</label>
            <input type=\"text\" id=\"nombre\" name=\"nombre\"><br><br>
        
            <label for=\"texto1\">Texto 1:</label>
            <input type=\"text\" id=\"texto1\" name=\"texto1\" id=\"texto1\"> <br><br>
        
            <label for=\"texto2\">Texto 2:</label>
            <input type=\"text\" id=\"texto2\" name=\"texto2\"><br><br>
        
            <input type=\"submit\" name=\"enviar2\" value=\"enviar2\">";

            $variable2= base64_encode(serialize($_POST["nombre"]."<br>".$_POST["texto1"]."<br>".$_POST["texto2"]));
            if(isset($_POST['enviar2'])){
                $variable1=unserialize(base64_decode($variable1));
                $variable2=unserialize(base64_decode($variable2));
                echo $variable1.'<br>'.$variable2;
            }

        }
    }
?>


