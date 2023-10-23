<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

if (isset($_POST['enviar'])) {
    $nombreUsusario= $_POST['nombre'];
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
        $nombre = $_FILES['archivo']['name'];
       $tipo = $_FILES['archivo']['type'];
       $almacenTemp = $_FILES['archivo']['tmp_name'];
        $tamanio= $_FILES['archivo']['size'];

        $destinoArchivo = 'imgEjercicio/' . $nombre;

        //Ahora se mueve la imagen cargada a la carpeta de imagenes del servidor
        move_uploaded_file($almacenTemp, $destinoArchivo);
    } else {
        $nameImage = 'No se ha seleccionado imagen.';
        $imageTMP = '';
        $tipo = '';
        $almacenTemp = '';
        $tamanio = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesado de archivos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <script defer src="code.js"></script>
</head>
<body>
    <fieldset>
        <legend>Datos</legend>
        <h3>Nombre del usuario: <?php echo $nombreUsusario; ?></h3>
        <p>Nombre: <?php echo $nombre; ?></p>
        <p>Tipo: <?php echo $tipo; ?></p>
        <p>Tamaño: <?php echo $tamanio; ?></p>
        <p>Destino temporal: <?php echo $almacenTemp; ?></p>
    </fieldset>
</body>
</html>
