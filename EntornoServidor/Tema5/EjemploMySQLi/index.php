<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //DataBaseHandler
    $dbh = new mysqli('localhost', 'joyitas_andalucia', 'joyitas', 'joyitas_andalucia');

    print $dbh->server_info;

    $results = $dbh->query('SELECT * FROM cantantes');

    $results = $results->fetch_all(MYSQLI_ASSOC);


   echo '<pre>';
   echo '<br>';
   print_r($results);
   echo '</pre>';

    ?>
</body>

</html>