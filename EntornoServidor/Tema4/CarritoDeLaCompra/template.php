<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="code.js"></script>
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Carrito de la compra</title>
</head>

<body>
    <header>
        <h1>Cervezas Leffe</h1>
    </header>
    <main>
        <section class="login">
            <article class="log">
                <?php if (isset($logeo) && !empty($logeo)) {
                    print $logeo;
                } ?>
            </article>
            <article class="error">
                <?php if (isset($_SESSION['errorMessage'])) {
                    echo '<h2>' . $_SESSION['errorMessage'] . '</h2>';
                    unset($_SESSION['errorMessage']); // Limpiar el mensaje de error después de mostrarlo
                } ?>
            </article>
        </section>
        <section class="tienda">
            <article class="seleccionTienda">
                <?php
                if (isset($mostrarTienda) && !empty($mostrarTienda)) {
                    print $mostrarTienda;
                }
                ?>
            </article>
        </section>
        <section class="carro">
            <article class="articleCarrito">
                <?php
                if ((isset($mostrarCarro)) && !empty($mostrarCarro)) {
                    print $mostrarCarro;
                }
                ?>
            </article>
        </section>
    </main>
    <footer>
        <p>Realizado por Manuel Maldonado.</p>
        <p>🍻 Por cada fallo en el código una 🍺 Leffe 🍺 al gaznate 🍻.</p>
    </footer>
</body>

</html>