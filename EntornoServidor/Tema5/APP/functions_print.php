<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db_config.php');

function doForm(){

        $output = '<form action="artista.php" method="POST" enctype="multipart/form-data">';
        $query = 'SELECT * FROM cantantes';
        $result= mysqli_query($dbh,$query);
        echo '<pre>';
        echo '<br>';
        print_r($result);
        echo '</pre>'; 
}

doForm();
?>