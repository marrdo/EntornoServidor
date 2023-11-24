<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('var.php');
require_once('functions_print.php');
require_once('db_config.php');

/* LOGEO */
if (isset($_POST['userName']) && isset($_POST['userPassword']) && isset($_SESSION['users'])) {
    // Obtener el nombre de usuario y la contraseña del formulario
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];

    // Verificar las credenciales en la base de datos utilizando PDO
    $query = "SELECT * FROM Entrenadores WHERE Nombre = :userName";
    /*PDOStatement -> stmt
    Se refiere a una "sentencia preparada".
     Una sentencia preparada es una característica de seguridad en las 
     consultas de base de datos que permite ejecutar la misma consulta 
     varias veces con parámetros diferentes.*/
    $stmt = $conn->prepare($query);

    // Vincular el parámetro :userName con el valor $userName
    $stmt->bindParam(':userName', $userName);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado como un array asociativo
    //  :: se utiliza para acceder a elementos estáticos de una clase en PHP
    // se utiliza en PHP para acceder a constantes y métodos estáticos de una 
    // clase, así como a propiedades estáticas
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
// fetch se utiliza para obtener la siguiente fila de resultados.
// Si esperas solo un resultado y no varios, puedes utilizar fetch sin un bucle.

/*Si tu consulta puede devolver varias filas y deseas procesar cada una 
de ellas, puedes usar un bucle while.

Obtener todas las filas en un bucle
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Acceder a los valores de la fila
    echo $result['id'];
    echo $result['nombre'];
    echo $result['email'];
    
    // Puedes hacer más cosas con los valores de la fila aquí
}
*/


    // Verificar la contraseña utilizando password_verify()
    if ($result && password_verify($userPassword, $result['Password'])) {
        // Las credenciales son válidas
        $_SESSION['username'] = $userName;
        header('Location: index.php');
    } else {
        // Las credenciales no son válidas
        // Realizar acciones después del inicio de sesión fallido
    }

    /*
    $query: Es la cadena de la consulta SQL, pero con un 
    marcador de posición :userName.

    $stmt: Se crea una sentencia preparada utilizando el método 
    prepare de la conexión PDO ($conn). $stmt ahora es un objeto PDOStatement.

    $stmt->bindParam(':userName', $userName): Vincula el valor de 
    $userName al marcador de posición :userName en la sentencia preparada.
     Esto es una forma de prevenir ataques de inyección SQL y es una 
     buena práctica.

    $stmt->execute(): Ejecuta la sentencia preparada con los 
    parámetros vinculados.

    $result = $stmt->fetch(PDO::FETCH_ASSOC): Obtiene una fila de 
    resultados como un array asociativo. En este caso, se 
    utiliza PDO::FETCH_ASSOC para obtener un array asociativo donde 
    los nombres de las columnas son las claves del array.
*/
}

/* REGISTRO (FUNCIONA)*/

if (isset($_POST['registro'])) {
    if (isset($_POST['registerName']) && $_POST['registerPassword']) {
        // Obtener el nombre de registro y la contraseña del formulario
        $nameRegister = $_POST['registerName'];
        $passwordRegister = $_POST['registerPassword'];

        // Hashear las contraseñas usando password_hash()
        $hashedName = password_hash($nameRegister, PASSWORD_DEFAULT);
        $hashedPassword = password_hash($passwordRegister, PASSWORD_DEFAULT);

        // Preparar la consulta de inserción utilizando sentencias preparadas
        $insertDatos = "INSERT INTO Entrenadores (Nombre, Password) VALUES (:nameRegister, :hashedPassword)";
        $stmt = $conn->prepare($insertDatos);

        // Vincular los parámetros :nameRegister y :hashedPassword con los valores correspondientes
        $stmt->bindParam(':nameRegister', $nameRegister);
        $stmt->bindParam(':hashedPassword', $hashedPassword);

        // Ejecutar la consulta de inserción
        $return = $stmt->execute();

        // Si return es true, redirigimos a login.php
        if ($return) {
            
            header('Location: login.php');
        } else {
            $error = '<h2>El usuario no se pudo registrar.</h2>';
        }
    }
}
if(isset($return)){
    print_r($return);
}

$log = pintar($login);

require_once('template.php');
