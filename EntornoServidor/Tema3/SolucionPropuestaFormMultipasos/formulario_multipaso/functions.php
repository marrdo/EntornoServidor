<?php
function getFinalData($formulario){
    //TODO
    $output = 'Aquí se mostrarían los datos del formulario en su conjunto';
    $output .= print_r($formulario, true);
    return $output;
}
function getFormularioMarkup($formulario){
    $output = '<form action="./" method="post">';
    foreach($formulario['paso'.$formulario['paso_actual']] as $control){
        switch($control['tipo']){
            case 'radio':
                $output .= '<h2>'.$control['description'].'</h2>';
                foreach($control['opciones'] as $value => $labelText){
                    $checked = ($value == $control['selected_value'])? 'checked': '';
                    $output .= '<input type="radio" id="'.$value.'" name="'.$control['name'].'" value="'.$value.'" '.$checked.'><label for="'.$value.'">'.$labelText.'</label><br>';
                }     
            break;
            case 'number':
                $output .= '<h2>'.$control['description'].'</h2>';
                $output .= '<label for="'.$control['name'].'">'.$control['label_text'].'</label><br><input type="number" id="'.$control['name'].'" name="'.$control['name'].'" value="'.$control['selected_value'].'">';
            break;
            case 'text':
                $output .= '<h2>'.$control['description'].'</h2>';
                $output .= '<label for="'.$control['name'].'">'.$control['label_text'].'</label><br><input type="text" id="'.$control['name'].'" name="'.$control['name'].'" value="'.$control['selected_value'].'">';
            break;
            case 'mail':
                $output .= '<h2>'.$control['description'].'</h2>';
                $output .= '<label for="'.$control['name'].'">'.$control['label_text'].'</label><br><input type="mail" id="'.$control['name'].'" name="'.$control['name'].'" value="'.$control['selected_value'].'">';
            break;
            case 'submit':
                $output.= '<input type="submit" value="'.$control['value'].'" name="'.$control['name'].'">';
            break;

        }
    }
    $output .= '</form>';
    return $output;
}

function procesaFormulario($formulario){
    switch($formulario['paso_actual']){
        case (2):
            //Rellenamos la descripción, en función de lo que haya en el paso 1.
            $paso_actual = $formulario['paso_actual'];
            $paso_anterior = $paso_actual-1;
            $formulario['paso'.$paso_actual]['control1']['description'] = 'Introduce el número de repeticiones que ya haces en '.strtolower($formulario['paso'.($paso_anterior)]['control1']['opciones'][$formulario['paso'.($paso_anterior)]['control1']['selected_value']]);
            $formulario['paso'.$paso_actual]['control2']['description'] = 'Introduce el número de kilos  que ya soportas en '.strtolower($formulario['paso'.($paso_anterior)]['control1']['opciones'][$formulario['paso'.($paso_anterior)]['control1']['selected_value']]);

        break;
        case (3):
            $formulario['paso3']['control1']['opciones']['mejora_repeticiones'] =$formulario['paso2']['control1']['selected_value'] +1;
            $formulario['paso3']['control1']['opciones']['mejora_peso'] =$formulario['paso2']['control2']['selected_value'] +1;
        break;

    }
    return $formulario;

}
