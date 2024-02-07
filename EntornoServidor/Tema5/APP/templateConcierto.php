<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <script defer src="asset/js/codeConciertos.js"></script>
    <link rel="stylesheet" href="asset/css/styleArtista.css">
    <title>Joyitas de Andalucía</title>
</head>
<body>
    <main>
        <?php 
        if (isset($mensajeExcepcion)) {
            print('<section class="error"><p>Se produjo el siguiente error: ' . htmlspecialchars($mensajeExcepcion) . '</p></secti>');
        }
                
                if (isset($actualizarConcierto)) {
                    print($actualizarConcierto);
                }
                if (isset($formModificarConcierto)) {
                    print($formModificarConcierto);
                }
                if (isset($mostrarTodosLosConciertos)) {
                    print($mostrarTodosLosConciertos);
                }
                if (isset($mostrarConciertoCantante)) {
                    print($mostrarConciertoCantante);
                }
        ?>
    </main>
</body>
</html>