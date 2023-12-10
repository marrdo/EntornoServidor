<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Podría contener la lógica principal 
// de tu aplicación, como la 
// implementación del patrón MVC y 
// la manipulación de solicitudes.

class Core
{
    //Atributos del core
    private $controller;
    private $method;
    private $params;

    public function __construct()
    {
        //Sacamos los atributos (controller, method y params) de la url
        //Gracias a apache mod_rewrite tenemos toda la información en $_GET['path']
        //La convención es usar controller/method/param1/param2/.../paramN
        $path_components = explode('/', filter_var($_GET['path'], FILTER_SANITIZE_URL));

        $this->controller = isset($path_components[0]) && !empty($path_components[0]) ? $path_components[0] : 'conciertos';
        $this->method = isset($path_components[1]) && !empty($path_components[1]) ? $path_components[1] : 'listar';
        $this->params = array_slice($path_components, 2); //TO DO: Gestionar el resto de query strings como elementos adicionales del array de parámetros.

        //El nombre del fichero lo capturamos siempre desde el index, que es 
        //donde inicia nuestra aplicacion.Se utiliza el $this->controller porque puede llamar a controladores distintos.
        $nombre_fichero_controller = '../app/controllers/' . $this->controller . '.php';

        //Comprobamos la existencia del controlador
        if (file_exists($nombre_fichero_controller)) {
            //Si existe incluimos el fichero controlador que nos proporcionen
            include_once($nombre_fichero_controller);

            /*Al haber incluido el fichero, ya tenemos su contenido,
            por tanto, vamos a extraer el nombre de la clase que contiene.
            Para esto, vamos sacar en mayusculas el nombre dela clase y 
            añadimos la cadena Controller.
            */
            $nombre_clase = ucfirst($this->controller) . 'Controller';
            /*Ahora el controlador, va a ser nuestra clase creada dentro del controlador
            es decir, un objeto que hayamos creado con ese fichero, que vamos a
            instanciar con la clase del fichero, para poder usar sus metodos.
            */
            $this->controller = new $nombre_clase;

            //Hacemos la comprobacion de si existe el metodo o no antes de ejecutarlo.
            if (method_exists($this->controller, $this->method)) {
                $this->controller->{$this->method}($this->params);
            } else {
                // Mostrar página de error 404
                header('HTTP/1.0 404 Not Found');
                echo "El método {$this->method} no existe en el controlador {$this->controller}";
            }
        } else {
            // Mostrar página de error 404
            header('HTTP/1.0 404 Not Found');
            echo "El archivo del controlador {$this->controller} no existe";
        }

    }
}
