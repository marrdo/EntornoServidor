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
/**Esto es por si llega al paso 4 y el usuario indica que no, se le devuelve al formulario 1
 * Se le pone el 0 porque luego con el boton enviar_datos va a sumar unos a pasos 
 * para seguir recorriendo el array
 * 
 */
if(isset($_POST['decision'])){
    
    $decision=$_POST['decision'];
    $no='no';
    if($decision == $no ){

        $_SESSION['paso'] = 0; 
        
    }
}

$paso = $_SESSION['paso'];

if (isset($_POST['enviar_datos'])) {
    $paso = ++$_SESSION['paso'];
} elseif (isset($_POST['volver'])) {

    $paso = --$_SESSION['paso'];
}


/*Debugger*/
echo '<pre>paso<br>';
print_r($paso);
echo '</pre>';
if ($paso == 1) {

     /*Debugger*/
     echo '<pre>POST<br>';
     print_r($_POST);
     echo '<br>Sesion<br>';
     print_r($_SESSION);
     echo '</pre>';


    $pintar_formulario = draw_form($formulario, $paso);


} elseif ($paso == 2) {



    if (isset($_POST['ejercicio'])) {
        $ejercicio = $_POST['ejercicio'];
        $user_data['ejercicio'] = $ejercicio;
    }
    /*Declaro el ejercicio en sesion*/
    $_SESSION['ejercicio'] = $ejercicio;


     /*Debugger*/
     echo '<pre>POST<br>';
     print_r($_POST);
     echo '<br>Sesion<br>';
     print_r($_SESSION);
     echo '</pre>';
   
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


     /*Debugger*/
     echo '<pre>POST<br>';
     print_r($_POST);
     echo '<br>Sesion<br>';
     print_r($_SESSION);
     echo '</pre>';

    $pintar_plan_mejora = print_planes_mejora($ejercicio, $rendimiento, $plazo, $planmejora);
    $pintar_formulario = draw_form($formulario, $paso);





} elseif ($paso == 4) {

     /*Debugger*/
    echo '<pre>POST<br>';
    print_r($_POST);
    echo '<br>Sesion<br>';
    print_r($_SESSION);
    echo '</pre>';

     
    $ejercicio=$_SESSION['ejercicio'];
    $kg=$_SESSION['kg'];
    $repeticiones=$_SESSION['repeticiones'];
    $rendimiento=$_SESSION['rendimiento'];
    $plazo=$_SESSION['plazo'];
        
    
    $pintar_formulario = draw_form($formulario, $paso);
            

}elseif ($paso == 5) {
     /*Debugger*/
     echo '<pre>POST<br>';
     print_r($_POST);
     echo '<br>Sesion<br>';
     print_r($_SESSION);
     echo '</pre>';

     $name=$_POST['name'];
     $email=$_POST['email'];
     $edad = $_POST['edad'];
     $ejercicio=$_SESSION['ejercicio'];
     $kg=$_SESSION['kg'];
     $repeticiones=$_SESSION['repeticiones'];
     $rendimiento=$_SESSION['rendimiento'];
     $plazo=$_SESSION['plazo'];

     $pintar_formulario = draw_form($formulario, $paso);
}




require_once('template.php');

?>