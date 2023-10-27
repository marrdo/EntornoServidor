<?php 

$formulario=array(
    1=>array(
        '<form action="index.php" method="POST" enctype="multipart/form-data">',
        '<fieldset>',
        '<legend><h2>¿Qué quieres mejorar?</legend></h2>',
        '<label><input type="radio" name="ejercicio" value="squat">Sentadillas</label>',
        '<label><input type="radio" name="ejercicio" value="pull_up">Dominadas</label>',
        '<label><input type="radio" name="ejercicio" value="deadlift">Peso muerto</label>',
        '</fieldset>',
        '<input type="submit" name="enviar_datos" value="Enviar">',
        '</form>'
    )
);


?>

