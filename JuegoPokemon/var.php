<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$arrTrainers = array();
$messageError = array(
    'Las credenciales proporcionadas no son correctas.'
);

$login= array(
    '<section class="login">',
    '<article class="logeo">',
    '<h2>Inicio de sesión</h2>',
    '<form action="login.php" method="post">',
    '<fieldset>',
    '<legend>Datos del entrenador</legend>',
    '<label for="name">Nombre:</label>',
    '<input type="text" id="name" name="name" />',
    '<label for="password">Contraseña:</label>',
    '<input type="password" id="password" name="password" />',
    '</fieldset>',
    '<input type="submit" value="Entrar" name="entrar"/>',
    '<input type="button" value="Registro" id="registro"/>',
    '</form>',
    '</article>',
    '<article class="registro">',
    '<h2>Apartado de registro</h2>',
    '<form action="login.php" method="post">',
    '<fieldset>',
    '<legend>Datos del entrenador a registrar</legend>',
    '<label for="name">Nombre:</label>',
    '<input type="text" id="name" name="registerName" />',
    '<label for="password">Contraseña:</label>',
    '<input type="password" id="password" name="registerPassword" />',
    '</fieldset>',
    '<input type="submit" value="Registrarse" name="registro"/>',
    '<input type="button" value="Inicio de sesión" id="volverInicio"/>',
    '</form>',
    '</article>',
    '</section>'
);
?>


    
        
    
    
    
    
    
    
