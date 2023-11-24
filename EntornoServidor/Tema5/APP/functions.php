<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function encontrarCantante($POST,$idCantante)
{ 
    foreach($POST as $id){
        if($id === $idCantante){
        return $POST[$id];
        }  
    }
    return 'Hubo un fallo';
}

function actualizar($query,$dbh)
{
    
    $dbh->query($query);
    if($dbh->query($query) === true){
        return true;
    }else{
        return false;
    }
}

function borrarCantante($query,$dbh)
{
    $dbh->query($query);
    if ($dbh->query($query) === true) {
        return true;
    }
    return false;
}
?>