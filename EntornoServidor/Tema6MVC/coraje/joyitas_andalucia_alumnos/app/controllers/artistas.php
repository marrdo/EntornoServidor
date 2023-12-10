<?php
class ArtistasController{
    
    private $modelo;
    
    public function listar($params){
        //Cargamos el modelo    
        $nombre_fichero_model = '../app/models/artistas.php';
        if(file_exists($nombre_fichero_model)){
            
            require_once($nombre_fichero_model);
            $this->modelo = new ArtistasModel();
            //Sacamos los datos del modelo
            $artistas = $this->modelo->getArtistasList();
    
            //Cargo la vista
            $nombre_fichero_vista = '../app/views/artistas.tpl.php';
            if(file_exists($nombre_fichero_vista)){
                include($nombre_fichero_vista);
            }
        }
        
    
    }
}