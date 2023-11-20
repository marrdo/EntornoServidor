<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('var.php');
require_once('functions_print.php');
require_once('db_config.php');

/* LOGEO */
if (isset($_POST['userName']) && isset($_POST['userPassword']) && isset($_SESSION['users'])) {
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $userPassword = $_POST['userPassword'];

    // Verificar las credenciales en la base de datos
    $query = "SELECT * FROM Entrenadores WHERE Nombre = '$userName'";
    $result = mysqli_query($conn, $query);
}

/* REGISTRO (FUNCIONA)*/

if (isset($_POST['registro'])) {
    if (isset($_POST['registerName']) && $_POST['registerPassword']) {
        /*Para guardar las contraseñas en las BBD Usaremos las pass
        directamente hasheadas, para esto utilizaremos crypt($pasword,$salt=opcional, si no lo ponemos se genera solo)
        o password_hash($password,  PASSWORD_DEFAULT)*/
        $nameRegister = $_POST['registerName'];
        $passwordRegister = $_POST['registerPassword'];
        // Hashear las contraseñas usando password_hash()
        $hashedName = password_hash($nameRegister, PASSWORD_DEFAULT);
        $hashedPassword = password_hash($passwordRegister, PASSWORD_DEFAULT);
        $insertDatos = "INSERT INTO Entrenadores (Nombre, Password) VALUES ('$nameRegister', '$hashedPassword')";
        // Debuger
        // echo '<pre>';
        // echo 'Passwird sin hash<br>';
        // print_r($passwordRegister);
        // echo 'PasswordHash<br>';
        // print_r($hashedPassword);
        // echo '</pre>';
        $return = mysqli_query($conn, $insertDatos);

        // Si return es true, redirigimos a login.php
        if ($return) {
            header('Location: login.php');
        } else {
            $error = '<h2>El usuario no se pudo registrar.</h2>';
        }
    }
}

$log = pintar($login);

require_once('template.php');
