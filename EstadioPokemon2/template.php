<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="elCSS.css">
</head>

<body>
    <header>
        <div id="user_form"><?php
                            if (isset($pintarCheckBoxes) && !empty($pintarCheckBoxes))
                                print $pintarCheckBoxes;
                            ?> </div>
    </header>

    <main>
        <div id="Info-Partida">
            <?php

            // Verificar si $generarCartas está definido y no está vacío
            if (isset($generarCartas) && !empty($generarCartas)) {
                print $generarCartas;
            }
            ?>
        </div>

        <div id="tablero"><?php

                            // Verificar si $generarTablero está definido y no está vacío
                            if (isset($generarTablero) && !empty($generarTablero)) {
                                print $generarTablero;
                            }
                            ?>
        </div>
    </main>
</body>

</html>