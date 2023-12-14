<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ArtistasController
{

    private $modelo;

    public function __construct()
    {
        // Comprobar si el archivo existe antes de incluirlo
        $nombre_modelo = '../app/models/artistas.php';
        if (file_exists($nombre_modelo)) {
            require_once($nombre_modelo);
            $this->modelo = new ArtistasModel();
        }
    }

    public function listar($params)
    {
        // Obtener las IDs de los artistas de los parámetros
        $idsArtista = $params;
        //Sacamos los datos del modelo
        $lista_artistas = $this->modelo->getListArtistas($idsArtista);

        //Hay que pasarlo a vistas. Vamos a cargarlas
        $nombre_fiche_vista = '../app/views/artistas/listArtistas.tpl.php';
        if (file_exists($nombre_fiche_vista)) {
            include($nombre_fiche_vista);
        }
    }

    public function crear()
    {
        $nombre_fichero_vista = '../app/views/artistas/crearArtista.php';
        if (file_exists($nombre_fichero_vista)) {
            include($nombre_fichero_vista);
        }
    }

    public function guardar()
    {
        // Verificamos si es una solicitud POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ya vemos los resultados, así que ahora toca instanciar el modelo
            try {
                // Intentamos guardar el artista
                $this->modelo->guardarArtista(
                    $_POST['nombreCantante'],
                    $_POST['generoCantante'],
                    $_POST['fechNacCatante'],
                    $_POST['precioBoloCantante'],
                    $_POST['LocalidadNacimientoCantante']
                );
                // Redireccionamos al usuario a la lista de artistas después de guardar
                header('Location: index.php?path=artistas/listar');
                exit();
            } catch (Exception $e) {

                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    public function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $this->modelo->borrarArtista($_POST['eliminarCantante']);

            // Redireccionamos al usuario a la lista de artistas después de guardar
            header('Location: index.php?path=artistas/listar');
            exit();
        }
    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $artistaParaActualizar = $this->modelo->capturarDatos($_POST['actualizarCantante']);

            $nombre_fichero_vista = '../app/views/artistas/updateArtistas.tpl.php';
            if (file_exists($nombre_fichero_vista)) {
                include($nombre_fichero_vista);
            }
        }
    }

    public function actualizacion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->modelo->actualizarCantante(
                $_POST['idCantante'],
                $_POST['nombreCantante'],
                $_POST['generoCantante'],
                $_POST['fechNacCatante'],
                $_POST['precioBoloCantante'],
                $_POST['localidadNacimientoCantante']
            );

            header('Location: index.php?path=artistas/listar');
            exit();
        }
    }
}
