<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ConciertosController
{
    private $modelo;

    public function __construct()
    {
        // Comprobar si el archivo existe antes de incluirlo
        $nombre_modelo = '../app/models/conciertos.php';
        if (file_exists($nombre_modelo)) {
            require_once($nombre_modelo);
            $this->modelo = new ConciertosModel();
        }
    }
    public function listar($params)
    {

        // Obtener las IDs de los artistas de los parámetros
        $idsConciertos = $params;

        //Sacamos los datos del modelo
        $lista_conciertos = $this->modelo->getListConciertos($idsConciertos);

        //Hay que pasarlo a vistas. Vamos a cargarlas
        $nombre_fiche_vista = '../app/views/conciertos/listConciertos.tpl.php';
        if (file_exists($nombre_fiche_vista)) {
            include($nombre_fiche_vista);
        }
    }

    public function eliminar($params)
    {
        $idConcierto = $params;

        $this->modelo->borrarConcierto($idConcierto);

        // Redireccionamos al usuario a la lista de artistas después de guardar
        header('Location: index.php?path=conciertos/listar');
        exit();
    }

    public function crear()
    {
        $nombre_fichero_vista = '../app/views/conciertos/crearConcierto.php';
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
                $this->modelo->guardarConcierto(
                    $_POST['nombreArtista'],
                    $_POST['fechaConcierto'],
                    $_POST['lugarConcierto'],
                    $_POST['nombreArtista'],
                    $_POST['aforoConcierto'],
                    $_POST['precioEntradaConcierto'],
                    $_POST['horaConcierto']
                );
                // Redireccionamos al usuario a la lista de artistas después de guardar
                header('Location: index.php?path=conciertos/listar');
                exit();
            } catch (Exception $e) {

                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    public function update($params)
    {
        $idConcierto = $params;

            $conciertoParaActualizar = $this->modelo->capturarDatos($idConcierto);

            $nombre_fichero_vista = '../app/views/conciertos/updateConcierto.tpl.php';
            if (file_exists($nombre_fichero_vista)) {
                include($nombre_fichero_vista);
            }
        
    }
}
