<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(isset($_SESSION['username'])){
    header('Location: seleccionPokemon.php');
    exit();
}else{
    header('Location: login.php');
    exit();
}