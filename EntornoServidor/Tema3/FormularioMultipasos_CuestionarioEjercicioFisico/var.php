<?php 
$user_data=array();

$formulario=array(
    1=>array(
        '<form action="index.php" method="POST" enctype="multipart/form-data">',
        '<fieldset>',
        '<legend>¿Qué quieres mejorar?</legend>',
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
        '<legend>Rendimiento actual</legend>',
        '<label>Peso del levantamiento: <input type="number" name="kg" required>Kg</label>',
        '<label>Repecitiones al fallo: <input type="number" name="repeticiones" required>Reps</label>',
        '</fieldset>',
        '<input type="submit" name="volver" value="Anterior">',
        '<input type="submit" name="enviar_datos" value="Siguiente">',        
        '</form>'
    ),
    3=>array(
        '<form action="index.php" method="POST" enctype="multipart/form-data">',
        '<fieldset>',
        '<legend>¿Quiere continuar con el plan de mejora personalizado?</legend>',
        '<label>Si <input type="radio" name="decision" value="si"></label>',
        '<label>No <input type="radio" name="decision" value="no"></label>',
        '</fieldset>',
        '<input type="submit" name="volver" value="Anterior">',
        '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="enviar_datos" value="Siguiente">', 
        '</form>'
    ),
    4=>array(
        '<form action="index.php" method="POST" enctype="multipart/form-data">',
        '<fieldset>',
        '<legend>Introduzca sus datos.</legend>',
        '<label>Nombre: <input type="text" name="name" required></label>',
        '<label>Email: <input type="email" name="email" required></label>',
        '<label>Edad: <input type="text" name="edad" required></label>',
        '</fieldset>',
        '<input type="submit" name="volver" value="Anterior">',
        '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="enviar_datos" value="Siguiente">', 
        '</form>'
    ),
    5=>array(
        '<article>',
        '<h3>Datos del usuario</h3><br>',
        '<p>Nombre: '.isset($name).'</p><br>',
        '<p>Email: '.isset($email).'</p><br>',
        '<p>Edad: '.isset($edad).'</p><br>',
        '</article>',
        '<article>',
        '<p>Ejercicio a mejorar: '.isset($ejercicio).'</p><br>',
        '<p>Rango en el que se encuentra: '.isset($rendimiento).'</p><br>',
        '<p>Medicion de peso maximo:  '.isset($kg).' y repeticiones al fallo: '.isset($repeticiones).'</p><br>',
        '<p>Plazo de mejoria: '.isset($plazo).'</p><br>',
        '</article>'
    )
);

$planmejora=array(
    'squat'=>array(
        'principiante'=>'Necesitas correr,hacer menos repeticiones con mas kg.',
        'intermedio'=>'Programar menos repeticiones y mas kg, con variantes del movimiento.',
        'avanzado'=>'Ejecutar ejercicios preventivos y buscar RMs en series cortas.'
    ),
    'pull up'=>array(
        'principiante'=>'Entrenar hombros y remo en anillas, con alguna dominada negativa.',
        'intermedio'=>'Pasar de hacer kipping a butterfly y estrictas con algo de lastre.',
        'avanzado'=>'Hacer pocas con mucho lastre para aumentar la fuerza.'
    ),
    'deadlift'=>array(
        'principiante'=>'Mejorar la tecnica para cargar mas kg.',
        'intermedio'=>'Aprender a trrabajar con el core e intentar RMs mas altos.',
        'avanzado'=>'Buscar RMs en muchas series muy cortas con intervalos largos de descanso.'

    )
);


?>

