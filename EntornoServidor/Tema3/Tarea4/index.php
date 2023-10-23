<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Saber si se han enviado datos
    if (isset($_POST['datos'])) {
        $datos = $_POST['datos'];

        //Ahora contamos que haya 2 datos
        if (count($datos) >= 2) {
            $nombre = $datos[0];
            $email = $datos[1];

            //Tras capturar los dos primeros datos vemos que pasa con la IMAGEN.

            /*Con $_FILES Cuando un usuario carga un archivo en un formulario web y lo envía, 
            los datos del archivo se almacenan en la variable $_FILES, 
            que es un superglobal en PHP.
            La variable $_FILES es un array asociativo que 
            contiene información sobre el archivo cargado*/

            /* 
            Elementos de $_FILES:
            ['nombre del campo'][name]--> nombre original del archivo en la máquina cliente
            ['nombre del campo'][type]--> tipo MIME del archivo. jpg, png, gif, etc.
            ['nombre del campo'][tmp_name]-->   ubicación temporal del archivo en el servidor después de cargarse
            ['nombre del campo'][error]--> Código de error (si lo hubiera) relacionado con la carga del archivo.
                Tipos de errores con valor:
                    UPLOAD_ERR_OK (valor 0): No se produjo ningún error; la carga se completó con éxito.
                    UPLOAD_ERR_INI_SIZE (valor 1): El archivo cargado excede la directiva upload_max_filesize en php.ini.
                    UPLOAD_ERR_FORM_SIZE (valor 2): El archivo cargado excede el tamaño máximo especificado en el formulario HTML mediante el atributo MAX_FILE_SIZE.
                    UPLOAD_ERR_PARTIAL (valor 3): El archivo se cargó parcialmente.
                    UPLOAD_ERR_NO_FILE (valor 4): No se seleccionó ningún archivo para cargar.
                    UPLOAD_ERR_NO_TMP_DIR (valor 6): Falta una carpeta temporal.
                    UPLOAD_ERR_CANT_WRITE (valor 7): Error al escribir el archivo en disco.
                    UPLOAD_ERR_EXTENSION (valor 8): Una extensión de PHP detuvo la carga del archivo.
            ['nombre del campo'][size]-->  tamaño del archivo en bytes.
            */

            /*
            1ªcondicion con isset queremos saber si se ha enviado una imagen
            funcion de isset: Devuelve true si la variable está definida y tiene un valor distinto de null. En caso contrario, devuelve false.
            */

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
                $nameImage = $_FILES['foto']['name'];
                $imageTMP = $_FILES['foto']['tmp_name'];
                $destinoImagen = "imgApache/" . $nameImage;


                //Ahora se mueve la imagen cargada a la carpeta de imagenes del servidor
                move_uploaded_file($imageTMP, $destinoImagen);
            } else {
                $nameImage = 'No se ha seleccionado imagen.';
                $imageTMP = '';
            }
            //Abrimos un archivo para poder escribir en el
            $archivo = fopen('datos.txt', 'a');
            //Escribimos en el archivo
            /*
            Al abrir un archivo en modo "a", cualquier dato que 
            se escriba en el archivo se agregará al final del 
            archivo sin sobrescribir o eliminar el contenido 
            existente. 
            Si el archivo no existe, se creará automáticamente.
            */
            //Escribimos los datos
            fwrite($archivo, $nombre . "\n");
            fwrite($archivo, $email . "\n");
            fwrite($archivo, "Ruta imagen:" . $destinoImagen . "\n");
            fwrite($archivo, "Ruta anterior:".$imageTMP."\n");
            //Cerramos el archivo
            fclose($archivo);
        }
    } else {
        echo '<p>No se han enviado datos</p>';
    }
} else {
    echo '<p>No se han enviado datos</p>';
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
    <h1>Datos Recopilados</h1>

    <?php
    // Leer el archivo datos.txt
    $archivo = fopen('datos.txt', 'r');

    // Verificar si el archivo se abrió correctamente
    if ($archivo) {
        // Leer y mostrar los datos línea por línea
        while (($linea = fgets($archivo)) !== false) {
            echo "<p>$linea</p>";
        }
        // Cerrar el archivo
        fclose($archivo);
    } else {
        echo "No se pudo abrir el archivo de datos.";
    }
    ?>
</body>

</html>