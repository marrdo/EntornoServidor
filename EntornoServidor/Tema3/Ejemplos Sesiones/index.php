<?php 
     session_start();

     if (!isset($_SESSION['usuario_recurrente'])) {
         // Es la primera vez que entra
         $_SESSION['usuario_recurrente'] = true;
         $_SESSION['contador'] = 1; // Inicializamos el contador a 1
         echo 'Es la primera vez que entra<br>';
     } else {
         // No es la primera vez que entra
         $_SESSION['contador']++;
         echo 'No es la primera vez que entra <br>';
         echo 'Has entrado ' . $_SESSION['contador'] . ' veces <br>';
     }
    



    if(isset($_POST['btnReinicio'])){
        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <script defer src="code.js"></script>
</head>
<body>
    <form action="index.php" method="post">
    <input type="submit" value="Click" name="btnReinicio">    
    </form>
    
</body>
</html>