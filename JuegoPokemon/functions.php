<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function registerUser($nameRegister,$passwordRegister,$arrTrainers)
{

    $arrTrainers[$nameRegister] = $passwordRegister;
    return $arrTrainers;
}

function validarUsuario($userName, $userPassword, $arrTrainers)
{
    $flag = false;
    foreach($arrTrainers as $name => $password){
        if(($userName === $name)&&($userPassword === $password)){
            $flag = true;
        }
    }
    return $flag;
}