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



    if (isset($_POST['ejercicio'])) {
        $ejercicio = $_POST['ejercicio'];
        $user_data['ejercicio'] = $ejercicio;
    }
    $_SESSION['ejercicio'] = $ejercicio;



   
    $pintar_formulario = draw_form($formulario, $paso);

} elseif ($paso == 3) {


    if (isset($_POST)) {
        $_SESSION['kg'] = $_POST['kg'];
        $_SESSION['repeticiones'] = $_POST['repeticiones'];
    }

    $kg = $_SESSION['kg'];
    $reps = $_SESSION['repeticiones'];
    $ejercicio = $_SESSION['ejercicio'];
    $_SESSION['ejercicio'] = $ejercicio;

    $rendimiento = determinar_estado($ejercicio, $kg, $reps);
    $plazo = determinar_plazo($rendimiento, $ejercicio);

    $_SESSION['rendimiento'] = $rendimiento;
    $_SESSION['plazo'] = $plazo;

    $pintar_plan_mejora = print_planes_mejora($ejercicio, $rendimiento, $plazo, $planmejora);
    $pintar_formulario = draw_form($formulario, $paso);

} elseif ($paso == 4) {

     /*Debugger*/
     echo '<pre>POSTTTTTTTT ';
     print_r($_POST);
     echo '</pre>';
     $pintar_formulario = '';
     $no=$_POST['decisicion'] == 'no';
     $si=$_POST['decision'] == 'si';
    if (isset($_POST['decisicion'])) {
        if ($no) {
            $decision = '<h3>Gracias, hasta otra.</h3>';
            $_SESSION['paso']=0;
            /*Debugger*/
    
        } elseif($si) {
            $_SESSION['rendimiento'] = $rendimiento;
            $_SESSION['plazo'] = $plazo;
            $_SESSION['ejercicio'] = $ejercicio;
            $_SESSION['kg'] = $kg ;
            $_SESSION['repeticiones'] = $reps;
            $pintar_formulario = draw_form($formulario, $paso);
            
        }
        
        /*Debugger*/
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    }


    /*POST
     [decision] => si
    [enviar_datos] => Siguiente
    */
    /*Sesion
    [paso] => 4
    [ejercicio] => squat
    [kg] => 100
    [repeticiones] => 2
    */
}




require_once('template.php');
