<?php
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
        $nombre_fiche_vista = '../app/views/listConciertos.tpl.php';
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
    
}
