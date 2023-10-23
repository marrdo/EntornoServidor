<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['submit'])){
    setcookie('contador','',time()-3600,"/");

}else{
    if(isset($_COOKIE['contador'])){
        $cookieContador=++$_COOKIE['contador'];
        setcookie('contador',$cookieContador,time()+240000000,"/");
        echo 'Vamos por la cookie numero '.$_COOKIE['contador'];
        // echo '<pre>';
        // print_r($_COOKIE);
        // echo '</pre>';
    }else{
        setcookie('contador',1,time()+240000000,"/");  
        
       echo 'Iniciando el contador de cookies';
    }
}

    
    
    

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        
        <input type="submit" value="Borrar cookie" name="submit">
    </form>
</body>
</html>