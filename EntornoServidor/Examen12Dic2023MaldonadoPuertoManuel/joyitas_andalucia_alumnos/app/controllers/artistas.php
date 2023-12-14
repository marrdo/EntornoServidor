<?php
class ArtistasController{
    

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
        $nombre_fiche_vista = '../app/views/artistas.tpl.php';
        if (file_exists($nombre_fiche_vista)) {
            include($nombre_fiche_vista);
        }
    }

    public function eliminar($params)
    {
        $idArtista = $params;

            $this->modelo->borrarArtista($idArtista[0]);

            // Redireccionamos al usuario a la lista de artistas después de guardar
            header('Location: index.php?path=artistas/listar');
            exit();
        }

        public function crear()
        {
            $nombre_fichero_vista = '../app/views/crearArtista.php';
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
    
                    echo 'Error al guardar: ' . $e->getMessage();
                }
            }
        }


}