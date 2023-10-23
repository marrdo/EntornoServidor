<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProcesarPHP</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>

<body>
    <h1>Selecciones del usuario</h1>
    <form action="./" method="post">
        <select>
            <?php
            if (isset($_POST['textNumero'])) {
                $numero = $_POST['textNumero'];

                for ($i = 1; $i <= $numero; $i++) {

                    echo "<option value='" . $i . "'>" . $i . "</option>";
                }
            }
            ?>
        </select>
    </form>
</body>

</html>