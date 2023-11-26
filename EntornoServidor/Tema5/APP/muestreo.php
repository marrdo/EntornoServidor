<?php 

$query = 'UPDATE cantantes SET nombre=?, genero=?, fecha_nacimiento=?, precio_bolo=?, localidad_nacimiento=? WHERE id=?';
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