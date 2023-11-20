<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dewes;host=127.0.0.1';
$user = 'dewes';
$password = '1234';

$dbh = new PDO($dsn, $user, $password);

var_dump($dbh);
?>