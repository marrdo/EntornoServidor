<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');
//Si el usuario ya está logueado lo mandamos a la página principal.
if(user_is_logged_in()){
    header('Location: ./');
    exit;
}
//Aquí se realiza el procesado de las variables que proceda.
if(($email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))&&
($password = filter_input(INPUT_POST, 'password'))){
    //Comprobamos si credenciales correcto
    $clave_usuario = comprueba_credenciales($users,$email,$password);
    if($clave_usuario!==false){
        header('Location: ./');
        //Reseteamos las variables de sesión
        unset($_SESSION['booked_events']);
        $_SESSION['user'] = $users[$clave_usuario];
        $_SESSION['message'] = 'Bienvenido '.$users[$clave_usuario]['user_name'];
        exit;
    }else{
        //Los credenciales no son adecuados
        $_SESSION['message'] = 'Invalid credentials';
    }       
}
$message = get_user_message();

require_once('../app/login_template.php');
?>