<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');

$_SESSION['mensaje']='';

if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit();
}else{
    

    $_SESSION['mensaje']='Bienvenido '.$_SESSION['user']['user_name'];
}

//Aquí se realiza el procesado de las variables que proceda.
//TO DO
if(isset($_SESSION['cursos'])){
    $cursos=$_SESSION['cursos'];
}




if((isset($_POST['cursos'])) ){
    $cursos[$_POST['cursos'][0]] = $events[$_POST['cursos'][0]];

    $_SESSION['cursos']=$cursos;
}



if(isset($_POST['borrarCurso'])){
    unset($cursos[$_POST['borrarCurso']]);
    $msnj=$events[$_POST['borrarCurso']];
    $_SESSION['mensajes'] = 'Event deleted '.$msnj['name'];
}


$events_markup = get_events_form_markup($events);
if(isset($cursos)){
$booked_courses_markup = get_modal_booked_events_form($cursos);
}
$message = get_user_message($_SESSION['mensaje']);

require_once('../app/main_template.php');
?>