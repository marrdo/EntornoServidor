<?php

/**
 * Función que genera el marcado del formulario HTML de los eventos a partir del parámetro events.
 * 
 * @param array $events: Un array asociativo con la lista de eventos. Consulta su estructura en el archivo vars.php
 * 
 * @return string La cadena html a insertar en la plantilla.
 */

function get_events_form_markup($events)
{
  //TO DO: Debes cambiar el siguiente marcado para que se genere a partir de $events. Ten presente que debes incluirlo en un formulario para que puedan gestionarse las inclusiones en la lista de booked_courses. Utiliza para ello el control de formulario que consideres oportuno.
  $output = '<form action="index.php" method="POST" enctype="multipart/form-data">
  <div class="col-lg-12 col-md-6">';
  foreach ($events as $clave => $propiedad) {
    $output .= '<div class="item">
      <div class="row">
        <div class="col-lg-3">
          <div class="image">
            <img src="' . $propiedad['img_url'] . '" alt="">
          </div>
        </div>
        <div class="col-lg-9">
          <ul>
            <li>
              <span class="category">' . $propiedad['category'] . '</span>
              <h4>' . $propiedad['name'] . '</h4>
            </li>
            <li>
              <span>Date:</span>
              <h6>' . date("d/m/Y", $propiedad['date_timestamp']) . '</h6>
            </li>
            <li>
              <span>Duration:</span>
              <h6>' . $propiedad['duration'] . '</h6>
            </li>
            <li>
              <span>Price:</span>
              <h6>' . $propiedad['price'] . '</h6>
            </li>
          </ul>
          
          <button type="submit" name="cursos[]" value="' . $clave . '"><i class="fa fa-angle-right"></i></button>
          
        </div>
      </div>
    </div>';
  }
  $output .= '</div>
  </form>';

  //TO DO: Si te sobra tiempo, como ampliación, incluye en el HTML sólo los eventos que NO hayan sido ya reservados.
  return $output;
}
/**
 * Función que genera el formulario HTML con la lista de eventos reservados. Junto a cada evento hay un botón de borrado. Los eventos reservados son una variable de sesión (superglobal), por lo que no es necesario pasarlo como parámetro. 
 * 
 * @return string La cadena html a insertar en la plantilla.
 */
function get_modal_booked_events_form($cursos = array())
{

    $output = '<form action="index.php" method="POST" enctype="multipart/form-data">
    <ul class="list-group">';
    foreach ($cursos as $clave => $valorCurso) {
      $output .= '<li class="list-group-item">' . $valorCurso['name'] . '<button type="submit" name="borrarCurso" value="'.$clave.'" class="btn btn-secondary float-end">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
</svg>
    </button></li>';
    }

    $output .= '</ul>';
  
    // $output = '<p>Your booked courses list is empty</p>';
  
  //TO DO: Debes cambiar el siguiente marcado para que se genere dinámicamente a partir de la variable de sesión. Ten presente que debes incluirlo en un formulario para que puedan gestionarse las eliminaciones en la lista de booked_courses. Utiliza para ello el control de formulario que consideres oportuno. Si la lista está vacía debe mostrarse el mensaje "Your booked courses list is empty".

  return $output;
}
/**
 * Esta función genera el texto del mensaje que irá en el toast que aparece en cada pantalla para comunicar 
 * 
 */
function get_user_message($mensaje)
{
  //TO DO: Gestiona los mensajes adecuadamente, a partir de la variable de sesión correspondiente, y devuelve el texto que se mostrará al usuario
  return $mensaje;
  //return 'Hola, esto es un mensaje';

}

//TO DO: Crea aquí las funciones adicionales que consideres oportunas.

function validarUsuario($userEmail,$userPassword,$users){
$flag=false;

    foreach($users as $clave => $propiedades){  
      if(($propiedades['email'] == $userEmail) && ($propiedades['hashed_password'] == $userPassword)){
        $flag =true;
      }

    }
    return $flag;
}

// Con esta funcion paso el id a index, y manejo los mensaje y toda al informacion
// del ususario con una sola clave.
function identificarIsuario($userEmail,$users){
  foreach($users as $clave => $propiedades){
    if(($propiedades['email'] == $userEmail) ){
      return $clave;
    }
  }
}