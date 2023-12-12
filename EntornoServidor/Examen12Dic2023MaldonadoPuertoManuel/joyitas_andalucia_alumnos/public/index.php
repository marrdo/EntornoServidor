<?php
if (!isset($_GET['path'])) {
    // No hay path en la URL actual, redirigimos a la ruta deseada
    header('Location: index.php?path=conciertos/listar');
    exit();
}
require_once('../app/iniciador.php');
?>