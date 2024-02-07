<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$login = array(
    '<section class="login">',
    '<article class="logeo">',
    '<h2>Inicio de sesión</h2>',
    '<form action="login.php" method="post">',
    '<fieldset>',
    '<legend>Datos del entrenador</legend>',
    '<label for="userName">Nombre:</label>',
    '<input type="text" id="userName" name="userName" />',
    '<label for="userPassword"">Contraseña:</label>',
    '<input type="password" id="userPassword"" name="userPassword" />',
    '</fieldset>',
    '<input type="submit" value="Entrar" name="entrar"/>',
    '<input type="button" value="Comenzar registro" id="registro"/>',
    '</form>',
    '</article>',
    '<article class="registro">',
    '<h2>Apartado de registro</h2>',
    '<form action="login.php" method="post">',
    '<fieldset>',
    '<legend>Datos del entrenador a registrar</legend>',
    '<label for="registerName">Nombre:</label>',
    '<input type="text" id="registerName" name="registerName" />',
    '<label for="registerPassword">Contraseña:</label>',
    '<input type="password" id="registerPassword" name="registerPassword" />',
    '</fieldset>',
    '<input type="submit" value="Registrarse" name="registro"/>',
    '<input type="button" value="Volver a inicio de sesión" id="volverInicio"/>',
    '</form>',
    '</article>',
    '</section>'
);
?>