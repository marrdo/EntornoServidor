<?php

$formulario = array(
    'paso_actual' => 1,
    'paso1' => array(
        'control1' => array(
            'description' => 'Introduce el músculo que quieres mejorar',
            'tipo' => 'radio',
            'name' => 'muscle_selection',
            'opciones' => array(
                'biceps' => 'Biceps', //Esto es value => label.textContent  
                'gluteo' => 'Glúteo',
                'pectorales' => 'Pectorales',
            ),
            'selected_value' => '',
        ),
        'control2' => array(
            'tipo' => 'submit',
            'value' => 'Siguiente',
            'name' => 'siguiente',
        ),
    ),
    'paso2' => array(
        'control1' => array(
            'description' => '',  //(Es dinámica y depende del paso 1)
            'tipo' => 'number',
            'name' => 'repetitions',
            'label_text' => 'Repeticiones',
            'selected_value' => '',
        ),
        'control2' => array(
            'description' => '',  //(Es dinámica y depende del paso 1)
            'tipo' => 'number',
            'name' => 'peso',
            'label_text' => 'Kg',
            'selected_value' => '',
        ),
        'control3' => array(
            'tipo' => 'submit',
            'value' => 'Anterior',
            'name' => 'anterior',
        ),
        'control4' => array(
            'tipo' => 'submit',
            'value' => 'Siguiente',
            'name' => 'siguiente',
        ),

    ),
    'paso3' => array(
        'control1' => array(
            'description' => 'Tus posibles mejoras:',
            'tipo' => 'radio',
            'name' => 'improvements',
            'opciones' => array(
                'mejora_repeticiones' => '', //Esto es value => label.textContent  
                'mejora_peso' => '',
            ),
            'selected_value' => '',
        ),
        'control2' => array(
            'tipo' => 'submit',
            'value' => 'Anterior',
            'name' => 'anterior',
        ),
        'control3' => array(
            'tipo' => 'submit',
            'value' => 'Siguiente',
            'name' => 'siguiente',
        ),
    ),
    'paso4' => array(
        'control1' => array(
            'description' => 'Escribe tu nombre',
            'tipo' => 'text',
            'name' => 'nombre',
            'label_text' => 'Nombre:',
            'selected_value' => '',
        ),
        'control2' => array(
            'description' => '',
            'tipo' => 'mail',
            'name' => 'mail',
            'label_text' => 'Email',
            'selected_value' => '',
        ),
        'control3' => array(
            'tipo' => 'submit',
            'value' => 'Anterior',
            'name' => 'anterior',
        ),
        'control4' => array(
            'tipo' => 'submit',
            'value' => 'Finalizar',
            'name' => 'finalizar',
        ),

    ),
);

