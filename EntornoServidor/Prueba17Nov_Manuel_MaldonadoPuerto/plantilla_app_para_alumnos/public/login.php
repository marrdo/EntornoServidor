<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');

//Aquí se realiza el procesado de las variables que proceda.
//TO DO
$_SESSION['mensaje']='';

if((isset($_POST['userEmail'])) && (isset($_POST['userPassword']))){
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

   
    $validacion=validarUsuario($userEmail,$userPassword,$users);
    
    if($validacion){
        $idUser=identificarIsuario($userEmail,$users);
        $_SESSION['username']=$userEmail;
        
        $_SESSION['user']= $users[$idUser];
        header('Location: index.php');
        exit();
    }else{
        $_SESSION['mensaje']= 'Invalid credential’';
    }
}

$message = get_user_message($_SESSION['mensaje']);

require_once('../app/login_template.php');
?>