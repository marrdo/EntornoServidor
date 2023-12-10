<?php
class ArtistasModel{
    private $conexion;
    public function __construct(){
        //Instanciar la conexión que estará disponible en el modelo.
        $this->conexion = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'joyitas_andalucia', 'joyitas');
        var_dump($this->conexion);
    }
    public function getArtistasList(){
        $sql = 'SELECT * FROM cantantes ORDER BY nombre';
        $sth = $this->conexion->query($sql);
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultados;
    }
}