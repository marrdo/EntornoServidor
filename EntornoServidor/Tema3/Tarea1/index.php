<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>

<body>
    <h1>Ejercicio de pares e impares</h1>
    <p>

        <?php

        if ($_POST["dato1"] % 2 == 0) {
            echo "El numero es par.";
        } else {
            echo "El numero es impar.";
        }
        ?>
    </p>
</body>

</html>