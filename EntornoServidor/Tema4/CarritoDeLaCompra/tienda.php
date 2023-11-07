<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

echo '<pre>';
print_r($_POST);
echo '</pre>';

if(($_POST['userName'] != 'admin') && $_POST['userPassword'] != '1234'){
    
    header('HTTP/1.0 401 Unauthorized');
    exit();
}else{

    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
header('Location: tienda.php');
exit();


}

?>