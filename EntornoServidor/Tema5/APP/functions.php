<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Busca un cantante en la base de datos utilizando una consulta preparada.
 *
 * @param mysqli $dbh - Objeto que representa la conexión a la base de datos.
 * @param int $idCantante - ID del cantante que se desea encontrar.
 *
 * @return array|string - Un array asociativo con la información del cantante si se encuentra,
 *                        o un mensaje de error en caso de fallo.
 */
function encontrarCantante($dbh, $idCantante)
{

    // Paso 1: Determinar si el parámetro es un entero (ID) o una cadena (nombre)
    if (is_numeric($idCantante)) {
        
        // Es un entero, asumimos que es el ID del cantante
        $query = 'SELECT * FROM cantantes WHERE id = ?';
        // Paso 2: Preparar la consulta usando una declaración preparada
        $stmt = $dbh->prepare($query);

        // Paso 3: Vincular el parámetro de ID a la consulta preparada
        // Se utiliza 'i' para indicar que el parámetro es un entero
        $stmt->bind_param('i', $idCantante);
    } else {
        // No es un entero, asumimos que es el nombre del cantante
        $query = 'SELECT * FROM cantantes WHERE nombre = ?';
        // Paso 2: Preparar la consulta usando una declaración preparada
        $stmt = $dbh->prepare($query);


        // Paso 3: Vincular el parámetro de nombre a la consulta preparada
        // Se utiliza 's' para indicar que el parámetro es una cadena
        $stmt->bind_param('s', $idCantante);
    }

    // Paso 4: Ejecutar la consulta preparada
    $stmt->execute();

    // Paso 5: Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Paso 6: Extraer la fila del resultado como un array asociativo
    $cantante = $result->fetch_assoc();

    // Paso 7: Cerrar la declaración preparada para liberar recursos
    $stmt->close();

    // Paso 8: Devolver el resultado o un mensaje de fallo si no se encuentra
    return $cantante ? $cantante : 'Hubo un fallo';
}


/**  La razón por la que en la función encontrarCantante no se incluye una 
 * verificación explícita después de la preparación de la consulta es 
 * porque generalmente, en el caso de una consulta SELECT simple, 
 * la preparación de la consulta es menos propensa a fallar.

Las consultas SELECT no alteran el estado de la base de datos y, 
por lo general, la preparación y ejecución de estas consultas son 
operaciones bastante seguras. Sin embargo, en la función actualizar, 
estamos tratando con una consulta que modifica el estado de la base 
de datos, y es posible que la preparación de la consulta falle por 
diversas razones, como problemas de sintaxis en la consulta o 
errores en los parámetros. 

La verificación explícita después de la preparación en actualizar 
es una medida de precaución adicional. Si la preparación de la consulta 
falla, evitamos intentar ejecutar la consulta, ya que eso podría llevar 
a errores más graves o inseguros.
 */


/**
 * Ejecuta una consulta de actualización en la base de datos utilizando una consulta preparada.
 *
 * @param mysqli $dbh - Objeto que representa la conexión a la base de datos.
 * @param string $query - Consulta SQL de actualización.
 * @param array $params - Parámetros para vincular en la consulta preparada.
 *
 * @return bool - Devuelve true si la actualización fue exitosa, o false en caso contrario.
 */
function actualizar($dbh, $query, $params)
{
    /* Paso 1: Se utiliza la función prepare del objeto 
    $dbh (que representa la conexión a la base de datos) para preparar 
    la consulta SQL especificada en $query.*/
    $stmt = $dbh->prepare($query);

    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $dbh->error);
    }
    /* Paso 2: Se verifica si la preparación de la consulta fue exitosa. 
    Si la preparación falla (por ejemplo, debido a un error de sintaxis 
    en la consulta), $stmt será false, y la función no continuará.
    */
    if ($stmt) {

        // Pase de parámetros por referencia utilizando un array de referencias
        $paramRefs = array();
        foreach ($params as $key => &$value) {
            $paramRefs[$key] = &$value;
        }
        /* Paso 3: Se utiliza call_user_func_array para llamar 
        dinámicamente al método bind_param del objeto $stmt con 
        los parámetros almacenados en el array $params.*/

        //Explicacion de call_user_func_array
        /** 
         * call_user_func_array es una función de PHP que se utiliza para llamar a 
         * una función de usuario con los argumentos suministrados en un array. 
         * Aquí hay una explicación más detallada:

        *    Nombre de la función: call_user_func_array
        *    Propósito: Llamar a una función con un conjunto de argumentos almacenados 
        *    en un array.
        *    Parámetros:
        *        Primer parámetro: La función a llamar.
                    *array($stmt, 'bind_param'), estás creando un array que contiene dos valores:
                    *
                    *$stmt: Este es un objeto de la clase mysqli_stmt 
                    *   que representa una declaración preparada. 
                    *   En este contexto, mysqli_stmt es una clase que tiene 
                    *   un método llamado bind_param.
                    *
                    *'bind_param': Este es un string que representa el 
                    *   nombre del método que queremos llamar.
                    *
                    *Entonces, en conjunto, array($stmt, 'bind_param') es un array 
                    *que contiene dos cosas: un objeto de la clase mysqli_stmt y un 
                    *string que es el nombre de un método.
                    *
        *        Segundo parámetro: Un array que contiene los argumentos que se 
        *        pasarán a la función.
        *    Devuelve: Devuelve el resultado de la función llamada.
        *
        *    En el contexto de las funciones que estamos discutiendo, se usa para 
        *    vincular dinámicamente los parámetros a una consulta preparada. 
        *    La función bind_param de una declaración preparada espera que los 
        *    parámetros se pasen de una manera específica. Cada parámetro tiene 
        *    un tipo (como 'i' para un entero, 's' para una cadena, etc.) y luego 
        *    se le pasa el valor real.
        *
        *El uso de call_user_func_array permite pasar dinámicamente los parámetros 
        *a bind_param según sea necesario. Esto es especialmente útil cuando no 
        *sabemos de antemano cuántos parámetros tendremos.
         */
        
        call_user_func_array(array($stmt, 'bind_param'), $params);

        /* Paso 4: Se ejecuta la consulta preparada.*/
        $stmt->execute();

        //Debugger
        // if ($stmt->affected_rows > 0) {
        //     echo "Actualización exitosa";
        // } else {
        //     echo "No se realizaron cambios";
        // }
        /* Paso 5: Se verifica si la consulta afectó a alguna fila. 
        Si $stmt->affected_rows es mayor que 0, significa que la consulta tuvo 
        éxito en modificar al menos una fila*/
        if ($stmt->affected_rows > 0) {
            /* Paso 6: Se cierra la consulta preparada.*/
            $stmt->close();
            return true; // La actualización fue exitosa
        }

        /* Paso 7: Cerrar la declaración preparada en caso de fallo.*/
        $stmt->close();
    }

    /* Paso 8: Si la función llega a este punto, significa que 
    hubo un problema durante la ejecución de la consulta o que la 
    consulta no afectó a ninguna fila. En este caso, la función devuelve false.*/
    return false;
}


/**
 * Borra un cantante de la base de datos utilizando una consulta preparada.
 *
 * @param mysqli $dbh Objeto que representa la conexión a la base de datos.
 * @param string $query Consulta SQL preparada que se ejecutará para borrar al cantante.
 * @param int $idCantante ID del cantante que se va a borrar.
 *
 * @return bool Devuelve true si el borrado fue exitoso, de lo contrario, devuelve false.
 */
function borrarCantante($dbh, $query, $idCantante)
{
    /* Paso 1: Utilizar una consulta preparada.
    Se utiliza la función prepare del objeto 
    $dbh (que representa la conexión a la base de datos) para preparar 
    la consulta SQL especificada en $query.*/
    $stmt = $dbh->prepare($query);

    /* Paso 2: Vincular el parámetro de ID a la consulta preparada.
    Se utiliza 'i' para indicar que el parámetro es un entero.*/
    $stmt->bind_param('i', $idCantante);

    /* Paso 3: Ejecutar la consulta preparada.*/
    $stmt->execute();

    /* Paso 4: Verificar si se borró correctamente.
    Si $stmt->affected_rows es mayor que 0, significa que la consulta tuvo 
    éxito en borrar al menos una fila.*/
    $borrado = $stmt->affected_rows > 0;

    /* Paso 5: Cerrar la consulta preparada.*/
    $stmt->close();

    /* Paso 6: Devolver true si se borró correctamente, 
    false en caso contrario.*/
    return $borrado;
}

/**
 * Función para incorporar un nuevo cantante a la base de datos.
 * 
 * @param mysqli $dbh - Objeto que representa la conexión a la base de datos.
 * @param string $nombre - Nombre del cantante.
 * @param string $genero - Género musical del cantante.
 * @param string $fechNacimiento - Fecha de nacimiento del cantante.
 * @param float $precio_bolo - Precio del bolo del cantante.
 * @param string $localidad - Localidad de nacimiento del cantante.
 * @return bool - Retorna true si la incorporación fue exitosa, 
 *                false en caso contrario.
 */
function incorporarCantante($dbh, $nombre, $genero, $fechNacimiento, $precio_bolo, $localidad) {
    // Utilizar consultas preparadas y vinculación de parámetros
    $query = 'INSERT INTO cantantes (nombre, genero, fecha_nacimiento, precio_bolo, localidad_nacimiento) VALUES (?, ?, ?, ?, ?)';
    $params = array("sssds", &$nombre, &$genero, &$fechNacimiento, &$precio_bolo, &$localidad);
    
    // Ejecutar la consulta
    $stmt = $dbh->prepare($query);
    
    // Vincular dinámicamente los parámetros a la consulta preparada
    call_user_func_array(array($stmt, 'bind_param'), $params);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Cerrar la declaración preparada
    $stmt->close();
    
    // Retorna true si la consulta se ejecutó correctamente, false en caso contrario
    return true; 
}

/*  ///////////////////////// CONCIERTOS  /////////////////////////////   */

function encontrarConcierto($dbh,$idConcierto){

    $query = 'SELECT * FROM Conciertos WHERE id=?';

    $stmt = $dbh->prepare($query);

    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $dbh->error);
    }

    $stmt->bind_param('i',$idConcierto);

    $stmt->execute();

    $result = $stmt->get_result();

    $concierto = $result->fetch_assoc();
    

    $stmt->close();

    return $concierto ? $concierto : 'No se encontro concierto';
}

function actualizarConcierto($dbh,$idConcierto,$idCantante,
$fecha,$lugar,$aforo,$precio,$hora)
{

    $query = 'UPDATE Conciertos SET 
    artista = ?,
    fecha = ?, 
    lugar = ?, 
    aforo =?, 
    precio_entradas = ?, 
    hora = ? 
    WHERE Conciertos.id = ?';

    $stmt = $dbh->prepare($query);

    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $dbh->error);
    }

    $stmt->bind_param('issidsi', $idCantante, $fecha, $lugar, $aforo, $precio, $hora, $idConcierto);

    $stmt->execute();

    if($stmt){
        if ($stmt->affected_rows > 0) {
            
            $stmt->close();
            return true; 
        }

        $stmt->close();
    }

    return false;
}

function borrarConcierto($dbh, $idConcierto) {
   
    $query = 'DELETE FROM Conciertos WHERE id=?';

    $stmt = $dbh->prepare($query);
    
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $dbh->error);
    }

    $stmt->bind_param('i', $idConcierto);

    $stmt->execute();
    
    if ($stmt) {
        if ($stmt->affected_rows > 0) {
            $stmt->close();
            return true;
        }

        $stmt->close();
    }
    
    return false;
}

function  aniadirConcierto($dbh,$idCantante,$fecha,$lugar,$aforo,$precio,$hora){

    $query = 'INSERT INTO Conciertos 
    (artista, fecha, lugar, aforo, precio_entradas, hora)
    VALUES (?, ?, ?, ?, ?, ?)';

    $stmt = $dbh->prepare($query);

    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $dbh->error);
    }
    
    $stmt->bind_param('isidis', $idCantante, $fecha, $lugar, $aforo, $precio, $hora);


    $stmt->execute();

    if($stmt){
        if ($stmt->affected_rows > 0) {
            
            $stmt->close();
            return true; 
        }

        $stmt->close();
    }

    return false;

}
