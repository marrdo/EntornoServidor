<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Multipasos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    
</head>
<body>
    <h1>Ejercicio formulario multipasos en INDEX</h1>
    <section class="paso1">
        <?php 
            if((isset($_SESSION['paso'])) && (!empty($_SESSION['paso'])) && ($_SESSION['paso']=1)){
                $pintar_formulario;
            }
        ?>
    </section>
</body>
</html>