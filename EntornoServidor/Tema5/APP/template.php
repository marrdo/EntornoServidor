<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <script defer src="asset/js/codeArtista.js"></script>
    <link rel="stylesheet" href="asset/css/styleArtista.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php 
            if(isset($mostrarCantantes)){
                print($mostrarCantantes);
            }
            if(isset($actualizado)){
                print ($actualizado);
            }
        ?>
    </main>
</body>
</html>