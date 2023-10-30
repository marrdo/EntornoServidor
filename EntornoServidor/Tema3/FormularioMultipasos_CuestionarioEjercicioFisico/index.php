<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('function.php');
require_once('functions_print.php');
require_once('var.php');

if (!isset($_SESSION['paso'])) {
    $_SESSION['paso'] = 1;
}

$paso = $_SESSION['paso'];

if (isset($_POST['enviar_datos'])) {
    $paso = ++$_SESSION['paso'];
} elseif (isset($_POST['volver'])) {

    $paso = --$_SESSION['paso'];
}

/*Debugger*/
// echo '<pre>';
// print_r($_SESSION);
//      print_r($formulario);
//      echo '</pre>';

/*Debugger*/
echo '<pre>';
print_r($paso);
echo '</pre>';
if ($paso == 1) {

    $pintar_formulario = draw_form($formulario, $paso);

} elseif ($paso == 2) {

    if (count($_SESSION) > 1) {
        foreach ($_SESSION as $campo=>$valor) {
            if ($campo != 'paso') {
                unset($_SESSION[$campo] );
            }
        }
    }


    if (isset($_POST['ejercicio'])) {
        $ejercicio = $_POST['ejercicio'];
        $user_data['ejercicio']=$ejercicio;
    }
    $_SESSION['ejercicio'] = $ejercicio;



    /*Debugger*/
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    $pintar_formulario = draw_form($formulario, $paso);

} elseif ($paso == 3) {

    if (count($_SESSION) > 2) {
        foreach ($_SESSION as $campo=>$valor) {
            if (($campo != 'paso') || ($campo != 'ejercicio')) {
                unset($_SESSION[$campo] );
            }
        }
    }

    if (count($user_data) > 1) {
        foreach ($_SESSION as $campo=>$valor) {
            if (($campo != 'ejercicio')) {
                unset($_SESSION[$campo] );
            }
        }
    }

    if (isset($_POST)) {
        $_SESSION['kg'] = $_POST['kg'];
        $_SESSION['repeticiones'] = $_POST['repeticiones'];
    }

    $kg = $_SESSION['kg'];
    $reps = $_SESSION['repeticiones'];
    $ejercicio = $_SESSION['ejercicio'];
    $_SESSION['ejercicio']=$ejercicio;

    $rendimiento=determinar_estado($ejercicio,$kg,$reps);
    $plazo=determinar_plazo($rendimiento,$ejercicio);

    
    /*DEBUGGER*/
    echo '<pre>';
    echo 'Array post<br>Repeticiones:';
    print_r($reps);
    echo '<br>';
    print_r($kg);
    echo ' KG<br>';
    echo 'Array sesion <br>Ejercicio: ';
    print_r($ejercicio);
    echo '</pre>';
    $pintar_formulario = draw_form($formulario, $paso);
}




require_once('template.php');
