<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('var.php');
require_once('functions.php');

/* LOGEO */
// if (isset($_POST['userName']) && isset($_POST['userPassword']) && isset($_SESSION['users'])) {
//     // Aquí iría la lógica para el inicio de sesión
// }

/* REGISTRO */
// if (isset($_POST['registro'])) {
//     if (isset($_POST['registerName']) && $_POST['registerPassword']) {
//         $nameRegister = $_POST['registerName'];
//         $passwordRegister = $_POST['registerPassword'];
//         $insertDatos = "INSERT INTO Entrenadores (Nombre, Password) VALUES ('$nameRegister', '$passwordRegister')";

//         $return = mysqli_query($conn, $insertDatos);

//         // Si return es true, redirigimos a login.php
//         if ($return) {
//             header('Location: login.php');
//         } else {
//             $error = '<h2>El usuario no se pudo registrar.</h2>';
//         }
//     }
// }

$log = pintar($login);

require_once('template.php');
?>