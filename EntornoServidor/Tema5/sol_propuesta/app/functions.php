<?php
/**
 * Función que genera el marcado del formulario HTML de los eventos a partir del parámetro events.
 * 
 * @param array $events: Un array asociativo con la lista de eventos. Consulta su estructura en el archivo vars.php
 * 
 * @return string La cadena html a insertar en la plantilla.
 */

function get_events_form_markup($events, $booked_events){
   $output = '<form action="./" method="post">';
   foreach($events as $clave=>$evento){
    if(!in_array($clave, $booked_events)){
      $output.='<div class="col-lg-12 col-md-6">
    <div class="item">
      <div class="row">
        <div class="col-lg-3">
          <div class="image">
            <img src="'.$evento['img_url'].'" alt="">
          </div>
        </div>
        <div class="col-lg-9">
          <ul>
            <li>
              <span class="category">'.$evento['category'].'</span>
              <h4>'.$evento['name'].'</h4>
            </li>
            <li>
              <span>Date:</span>
              <h6>'.date('d M Y', $evento['date_timestamp']).'</h6>
            </li>
            <li>
              <span>Duration:</span>
              <h6>'.$evento['duration'].' Hours</h6>
            </li>
            <li>
              <span>Price:</span>
              <h6>$'.$evento['price'].'</h6>
            </li>
          </ul>
          <button type="submit" value="'.$clave.'" name="event_id"><i class="fa fa-angle-right"></i></button>
        </div>
      </div>
    </div>
  </div>';
    }
   }
   $output .= '</form>';
   return $output;
}
/**
 * Función que genera el formulario HTML con la lista de eventos reservados. Junto a cada evento hay un botón de borrado. Los eventos reservados son una variable de sesión (superglobal), por lo que no es necesario pasarlo como parámetro. 
 * 
 * @return string La cadena html a insertar en la plantilla.
 */
function get_modal_booked_events_form($events,$booked_events){
    //TO DO: Debes cambiar el siguiente marcado para que se genere dinámicamente a partir de la variable de sesión. Ten presente que debes incluirlo en un formulario para que puedan gestionarse las eliminaciones en la lista de booked_courses. Utiliza para ello el control de formulario que consideres oportuno. Si la lista está vacía debe mostrarse el mensaje "Your booked courses list is empty".
    
    if(empty($booked_events)){
      $output = 'Your booked courses list is empty';
    }else{
      $output = '<form action="./" method="post">';
      $output .= '<ul class="list-group">';
      foreach($booked_events as $booked_event){
        $output .='<li class="list-group-item">'.$events[$booked_event]['name'].' <button type="submit" name="delete_event" value="'.$booked_event.'" class="btn btn-secondary float-end">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
</svg>
      </button></li>';
      }
      $output.='</ul>';
      $output.='</form>';
    }
    return $output;
}
/**
 * Esta función genera el texto del mensaje que irá en el toast que aparece en cada pantalla para comunicar 
 * 
 */
function get_user_message(){
  //TO DO: Gestiona los mensajes adecuadamente, a partir de la variable de sesión correspondiente, y devuelve el texto que se mostrará al usuario
  $mensaje = isset($_SESSION['message'])?$_SESSION['message']:''; 
  unset($_SESSION['message']);
  return $mensaje;
}

function user_is_logged_in(){
  $logged = isset($_SESSION['user'])?true : false;
  return $logged;
}
function comprueba_credenciales($usuarios, $email,$contrasena){
  foreach($usuarios as $clave_usuario => $user){
    if(($user['email']==$email)&&($user['hashed_password']==hash('sha256', $contrasena))){
      return $clave_usuario;
    }
  }
  return false;
}

function get_events_from_db(){
  /* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dewes;host=127.0.0.1';
$user = 'dewes';
$password = '1234';

$dbh = new PDO($dsn, $user, $password);

var_dump($dbh);
}