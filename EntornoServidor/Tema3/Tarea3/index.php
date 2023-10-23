<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>

<body>
    <?php
    $color = "white";
    $borde = "thin";
    $fuente = "normal";

    if (isset($_POST['fondoRojo']) && ($_POST['fondoRojo'] == 1)) {
        $color = 'red';
    }
    if (isset($_POST['bordeAncho']) && ($_POST['fondoRojo'] == 1)) {
        $borde = 'thinck';
    }
    if (isset($_POST['negrita']) && ($_POST['negrita'] == 1)) {
        $fuente = 'bolder';
    }
    print_r($_POST);
    print_r($color);
    print_r($fuente)
    ?>

    <textarea name="" id="" cols="30" rows="13" style="border:<?php echo $borde ?>; background-color:<?php echo $color ?>;font-weight: <?php echo $fuente ?>; ">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, deleniti a sunt doloremque blanditiis minus porro eveniet aperiam nesciunt maiores odio atque, non ullam facilis laudantium facere quod fuga corporis!</p>
    <p>Similique eaque esse, quidem accusamus minima sapiente, amet nemo veniam in non magnam saepe quasi illum qui praesentium dolor vitae sequi ex eius, reprehenderit quam. Eaque cum voluptas consectetur impedit.</p>
    </textarea>
</body>

</html>