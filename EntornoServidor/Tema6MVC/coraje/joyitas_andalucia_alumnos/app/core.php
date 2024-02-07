<?php

class Core{
    //Atributos del core
    private $controller;
    private $method;
    private $params;

    public function __construct(){
        //Sacamos los atributos (controller, method y params) de la url
        //Gracias a apache mod_rewrite tenemos toda la información en $_GET['path']
        //La convención es usar controller/method/param1/param2/.../paramN
        

        $path_components = explode('/', filter_var($_GET['path'], FILTER_SANITIZE_URL));

        $this->controller = isset($path_components[0])&&!empty($path_components[0])?$path_components[0]:'conciertos';
        $this->method = isset($path_components[1])&&!empty($path_components[1])?$path_components[1]:'listar';
        $this->params = array_slice($path_components,2); //TO DO: Gestionar el resto de query strings como elementos adicionales del array de parámetros.

        $nombre_fichero_controller = '../app/controllers/'.$this->controller.'.php';
        if(file_exists($nombre_fichero_controller)){
            include_once($nombre_fichero_controller);
            $nombre_clase = ucfirst($this->controller).'Controller'; 
            $this->controller = new $nombre_clase();

            if(method_exists($this->controller,$this->method)){
                $this->controller->{$this->method}($this->params);
            }else{
                //Throw exception
            }
        }else{
            //Throw exception
        }
        
    }
}