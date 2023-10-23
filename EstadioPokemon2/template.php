<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <script defer src="code.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="user_form"><?php
    if(isset($pintarCheckBoxes)&& !empty($pintarCheckBoxes)) 
        print $pintarCheckBoxes;
    ?>  </div>

    <div id="tablero"><?php 
    
    // Verificar si $generarTablero está definido y no está vacío
        if (isset($generarTablero) && !empty($generarTablero)) {
            print $generarTablero;
        }
        ?>    
    </div>
</body>
</html>