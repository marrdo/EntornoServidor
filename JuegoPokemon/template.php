<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <script defer src="asset/js/code.js"></script>
    <title>Pokemones</title>
</head>
<body>
    <header><figure><img src="asset/img/International_Pokémon_logo.png" alt=""></figure><h1>Juego Pokemon</h1></header>
    <main>
    <?php 
        if (isset($logeo) && !empty($logeo)) {
            print $logeo;
        }
    ?>
    </main>
    <footer><p>Trabajo realizado por Manuel Maldonado</p></footer>
    
</body>
</html>