<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('var.php');
// require_once('functions.php');

//Creacion Tabla conciertos
//CREATE TABLE `joyitas_andalucia`.`Conciertos` (`id` INT NOT NULL AUTO_INCREMENT , `artista` VARCHAR(220) NOT NULL , `fecha` DATE NOT NULL , `lugar` VARCHAR(220) NOT NULL , `aforo` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

/*Creacion del database Handler*/

$dbh = new mysqli('localhost','joyitas_andalucia', 'joyitas', 'joyitas_andalucia');

?>