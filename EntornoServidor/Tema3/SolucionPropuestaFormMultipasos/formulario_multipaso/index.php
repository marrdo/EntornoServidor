<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vars.php');
require_once('functions.php');

//Hacemos el procesado
if(!isset($_SESSION['formulario'])){
    //Aquí entra la primera vez que el usuario llega a mi aplicación
    $_SESSION['formulario'] = $formulario;
}else{
    $formulario = $_SESSION['formulario'];
}

//Procesamos los valores de POST
if((isset($_POST['siguiente']))||(isset($_POST['anterior']))||(isset($_POST['finalizar']))){
    $paso_actual = $formulario['paso_actual'];
    //El usuario pulsó siguiente
    
    //Debemos guardar los valores seleccionados en el paso que corresponda.
    foreach($formulario['paso'.$paso_actual] as &$control){
        if($control['tipo'] != 'submit'){
            //Guardo el valor que haya asociado en la variable POST
            $control['selected_value'] = $_POST[$control['name']];
            
        }
    }
    if(isset($_POST['siguiente'])){
        //Debemos sumar un paso al paso actual
        $formulario['paso_actual']++;
        //Si hay que actualizar algún otro paso del formulario, para generarlo dinámicamente, podemos hacerlo aquí
        $formulario = procesaFormulario($formulario);
        $content = getFormularioMarkup($formulario);
    }else if(isset($_POST['anterior'])){
        $formulario['paso_actual']--;
        $content = getFormularioMarkup($formulario);
    }else if(isset($_POST['finalizar'])){
        $content = getFinalData($formulario);
    }
}else{
    $content = getFormularioMarkup($formulario);
}

//Al final del procesado, actualizo la variable de sesión
$_SESSION['formulario'] = $formulario;

//Renderizamos

require_once('template.php');