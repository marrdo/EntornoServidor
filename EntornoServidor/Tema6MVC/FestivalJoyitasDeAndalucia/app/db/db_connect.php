<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Database
{
    private $server = 'localhost';
    private $bbdd = 'joyitas_andalucia';
    private $user = 'joyitas_andalucia';
    private $userPass = 'joyitas';
    
    //Manejador de bbdd
    private $dbh;

    public function __construct()
    {
        

        try {
            //Establecemos conexion
            $this->dbh = new PDO("mysql:host=$this->server;dbname=$this->bbdd", $this->user, $this->userPass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /* 
                PDO::ATTR_ERRMODE: Este es un atributo de configuración que determina cómo PDO
                debería manejar los errores.

                PDO::ERRMODE_EXCEPTION: Esta constante indica que PDO debe lanzar una 
                excepción en caso de error. Es decir, si ocurre algún error durante la 
                ejecución de una consulta PDO, en lugar de simplemente devolver un código 
                de error, lanzará una excepción que puedes capturar y manejar en tu código.
            */
        } catch (Exception $e) {
            // Capturar el error si no hay conexion
            die('Error al conectar con la base de datos: ' . $e->getMessage());
        }
    }

    public function getDbh()
    {
        //Devuelve la conexion
        return $this->dbh;
    }

    public function closeConnectDbh()
    {
        //Cierra la conexion
        $this->dbh = null;
    }
}
