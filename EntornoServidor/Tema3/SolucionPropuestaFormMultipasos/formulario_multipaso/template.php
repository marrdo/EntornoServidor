<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Formulario multipaso:  <?php echo $formulario['paso_actual']; ?> /<?php echo (count($formulario)-1); ?></title>
</head>
<body>
    <h1>Formulario multipaso: <?php echo $formulario['paso_actual']; ?> /<?php echo (count($formulario)-1); ?></h1>    
        <?php echo $content; ?> 
    
</body>
</html>