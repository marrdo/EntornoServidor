<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
</head>

<body>
    <section class="login">
        <article>
            <?php if (isset($logeo) && !empty($logeo)) {
                print $logeo;
            } ?>
        </article>
        <article>
        <?php if (isset($_SESSION['errorMessage'])) {
                echo '<h2>' . $_SESSION['errorMessage'] . '</h2>';
                unset($_SESSION['errorMessage']); // Limpiar el mensaje de error después de mostrarlo
            } ?>
        </article>
    </section>
    <section class="tienda">
        <?php
        if (isset($mostrarTienda) && !empty($mostrarTienda)) {
            print $mostrarTienda;
        }
        ?>
    </section>
</body>

</html>

<input type="number" name="" id="">