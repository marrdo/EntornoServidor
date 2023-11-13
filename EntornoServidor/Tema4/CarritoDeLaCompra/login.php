<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//Debugger
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
require_once('var.php');
require_once('functions.php');

if((isset($_POST['userName'])) && (isset($_POST['userPassword']))){

    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $validarUser = validarUsuario($userName,$userPassword,$arrValidUser);
    if($validarUser){
        $_SESSION['userName'] = $userName;
        
        header('Location: tienda.php');
        exit();
    }else{
        $_SESSION['errorMessage'] = 'Las credenciales proporcionadas no son corretas.';
        
        
    }
}


$login=$arrForm['login'];

$logeo = mostrarLogin($login);

require_once('template.php');
