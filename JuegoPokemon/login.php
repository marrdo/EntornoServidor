<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// Debugger
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
require_once('var.php');
require_once('functions.php');
require_once('functions_print.php');

if ((isset($_POST['userName'])) && (isset($_POST['userPassword']))&&(isset($_SESSION['users']))) {

    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $arrTrainers = $_SESSION['users'];
    //Debugger
echo '<pre>';
echo 'Array trainers despues de sesion<br> ';
print_r($arrTrainers);
echo '</pre>';
    $validarUser = validarUsuario($userName, $userPassword, $arrTrainers);
    if ($validarUser) {
        $_SESSION['userName'] = $userName;

        header('Location: index.php');
        exit();
    } else {
        $_SESSION['errorMessagelogin'] = $messageError[0];
    }
}

if(isset($_POST['registro'])){
if (isset($_POST['registerName']) && $_POST['registerPassword']) {
    $nameRegister = $_POST['registerName'];
    $passwordRegister = $_POST['registerPassword'];
    $arrTrainers = registerUser($nameRegister, $passwordRegister, $arrTrainers);
    $_SESSION['users'] = $arrTrainers;
}
}



$logeo = mostrar($login);

require_once('template.php');
