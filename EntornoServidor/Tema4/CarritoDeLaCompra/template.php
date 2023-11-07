<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
</head>

<body>
    <section class="login">
        <?php if (isset($logeo) && !empty($logeo)) {
            print $logeo;
        } ?>
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