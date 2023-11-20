<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<header>
        <figure><img src="/JuegoPokemonPruebaBBDD/asset/img/International_Pokémon_logo.png" alt=""></figure>
        <h1>Juego Pokemon</h1>
    </header>
    <main>
        <?php
        if (isset($log) && !empty($log)) {
            print $log;
        }
        ?>
    </main>
    <footer>
        <p>Trabajo realizado por Manuel Maldonado</p>
    </footer>
</body>

</html>