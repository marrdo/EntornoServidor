<?php 
$user_data=array();

$formulario=array(
    1=>array(
        '<form action="index.php" method="POST" enctype="multipart/form-data">',
        '<fieldset>',
        '<legend><h2>¿Qué quieres mejorar?</h2></legend>',
        '<label><input type="radio" name="ejercicio" value="squat">Sentadillas</label>',
        '<label><input type="radio" name="ejercicio" value="pull up">Dominadas</label>',
        '<label><input type="radio" name="ejercicio" value="deadlift">Peso muerto</label>',
        '</fieldset>',
        '<input type="submit" name="enviar_datos" value="Siguiente">',
        '</form>'
    ),
    2=>array(
        '<form action="index.php" method="POST" enctype="multipart/form-data">',
        '<fieldset>',
        '<legend><h2>Rendimiento actual</h2></legend>',
        '<label>Peso del levantamiento: <input type="number" name="kg">Kg</label>',
        '<label>Repecitiones al fallo: <input type="number" name="repeticiones">Reps</label>',
        '</fieldset>',
        '<input type="submit" name="volver" value="Anterior">',
        '<input type="submit" name="enviar_datos" value="Siguiente">',        
        '</form>'
    ),
    3=>array(
        '<form action="index.php" method="POST" enctype="multipart/form-data">',
        '<input type="submit" name="volver" value="Anterior">',
        '<input type="submit" name="enviar_datos" value="Siguiente">', 
        '</form>'
    )
);

$planmejora=array(
    'squat'=>array(
        'principiante'=>'Necesitas correr,hacer menos repeticiones con mas kg',
        'intermedio'=>'Programar menos repeticiones y mas kg, con variantes del movimiento',
        'avanzado'=>'Ejecutar ejercicios preventivos y buscar RMs en series cortas'
    ),
    'pull up'=>array(
        'principiante'=>'Entrenar hombros y remo en anillas, con alguna dominada negativa',
        'intermedio'=>'Pasar de hacer kipping a butterfly y estrictas con algo de lastre',
        'avanzado'=>'Hacer pocas con mucho lastre para aumentar la fuerza.'
    ),
    'deadlift'=>array(
        'principiante'=>'Mejorar la tecnica para cargar mas kg',
        'intermedio'=>'Aprender a trrabajar con el core e intentar RMs mas altos.',
        'avanzado'=>'Buscar RMs en muchas series muy cortas con intervalos largos de descanso'

    )
);

?>

