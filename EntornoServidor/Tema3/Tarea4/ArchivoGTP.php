<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han enviado datos
    if (isset($_POST["datos"])) {
        $datos = $_POST["datos"];
        
        // Asegúrate de que haya al menos dos elementos en el array
        if (count($datos) >= 2) {
            $nombre = $datos[0];
            $email = $datos[1];

            // Verifica si se ha cargado una imagen
            if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
                $image_name = $_FILES["foto"]["name"];
                $image_tmp_name = $_FILES["foto"]["tmp_name"];
                $image_destination = "uploads/" . $image_name;

                // Mueve la imagen cargada a la carpeta "uploads"
                move_uploaded_file($image_tmp_name, $image_destination);
            } else {
                $image_name = "No se ha seleccionado una imagen.";
                $image_destination = "";
            }

            // Abre el archivo CSV o TXT en modo de escritura
            //$file = fopen("data.csv", "a"); // Cambia "data.csv" por el nombre del archivo que desees

            // Escribe los datos en el archivo
            //fputcsv($file, [$nombre, $email, $image_destination]);

            // Cierra el archivo
            //fclose($file);


            // Abre el archivo TXT en modo de escritura
            
            $file = fopen("data.txt", "a"); // Cambia "data.txt" por el nombre del archivo que desees

            // Escribe los datos en el archivo TXT
            fwrite($file, "Nombre: $nombre\n");
            fwrite($file, "Email: $email\n");
            fwrite($file, "Ruta de la imagen: $image_destination\n\n");

            // Cierra el archivo
            fclose($file);
        } else {
            echo "No se han proporcionado datos suficientes.";
        }
    } else {
        echo "No se han proporcionado datos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
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
    </form>
</body>
</html>
