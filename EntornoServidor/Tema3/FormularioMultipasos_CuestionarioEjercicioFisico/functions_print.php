<?php



function draw_form($formulario, $paso)
{

    $content = '';

    if (isset($formulario[$paso])) {
        foreach ($formulario[$paso] as $frase) {
            $content .= $frase;
        }
    }

    return $content;
}



function print_planes_mejora($ejercicio, $rendimiento, $plazo,$planmejora)
{

    
    switch ($ejercicio) {
        case 'squat':
            # code...
            switch ($rendimiento) {
                case 'principiante':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                case 'intermedio':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                case 'avanzado':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                default:
                    # code...
                    break;
            }
            break;

        case 'pull up"':
            switch ($rendimiento) {
                case 'principiante':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                case 'intermedio':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                case 'avanzado':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                default:
                    # code...
                    break;
            }
            break;

        case 'deadlift':
            switch ($rendimiento) {
                case 'principiante':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                case 'intermedio':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                case 'avanzado':
                    return $mejora=$planmejora[$ejercicio][$rendimiento].'<br><p>Podrás notar mejoría en '.$plazo.' meses.</p>';
                    break;
                default:
                    # code...
                    break;
            }
            break;

        default:
            # code...
            break;
    }
}
