<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');
if(!user_is_logged_in()){
    header('Location: ./login.php');
    exit;
}
//Aquí se realiza el procesado de las variables que proceda.
//Inicialización de la variable de sesión
$booked_events = (isset($_SESSION['booked_events'])&&!empty($_SESSION['booked_events']))?$_SESSION['booked_events']:array();
if($booked_event = filter_input(INPUT_POST,'event_id', FILTER_VALIDATE_INT)){
    //Si hay un curso, lo metemos en los cursos, si no ha sido metido ya
    if(!in_array($booked_event,$booked_events)){
        $booked_events[]= $booked_event;
        $_SESSION['message'] = 'Event added: '.$events[$booked_event]['name'];
    }
}
if($deleted_event = filter_input(INPUT_POST,'delete_event', FILTER_VALIDATE_INT)){
    //Si está el evento lo sacamos
    $clave = array_search($deleted_event, $booked_events);
    if($clave!==false){   
        unset($booked_events[$clave]);
        $_SESSION['message'] = 'Event deleted';
    }
}
$events_markup = get_events_form_markup($events, $booked_events);
$booked_courses_markup = get_modal_booked_events_form($events,$booked_events);

$message = get_user_message();
//Antes de irnos, guardamos $events en session
$_SESSION['booked_events'] = $booked_events;
require_once('../app/main_template.php');
?>