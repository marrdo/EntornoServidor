<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <script defer src="asset/js/codeArtista.js"></script>
    <link rel="stylesheet" href="asset/css/styleArtista.css">
    <title>Festival Joyitas de Andalucía</title>
</head>

<body>
    <main>
        <?php

        if (isset($mensajeExcepcion)) {
            print('<section class="error"><p>Se produjo el siguiente error: ' . htmlspecialchars($mensajeExcepcion) . '</p></secti>');
        }

        if (isset($mostrarFormActualizar)) {
            print($mostrarFormActualizar);
        }
        if (isset($mostrarCantantes)) {
            print($mostrarCantantes);
        }
        //Los siguientes añaden información al usuario.
        if (isset($actualizado)) {
            print($actualizado);
        }
        if (isset($borrado)) {
            print($borrado);
        }
        if (isset($incorporacion)) {
            print($incorporacion);
        }

    
        ?>
    </main>
</body>

</html>