<?php

class DatabaseImporter {
    private $pdo;

    public function __construct($servername, $username, $password, $dbname) {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
    }

    public function importSQL($sqlFile) {
        try {
            if (!file_exists($sqlFile)) {
                throw new Exception("El archivo SQL no existe.");
            }

            $sql = file_get_contents($sqlFile);
            $this->pdo->exec($sql);
            echo "Base de datos importada correctamente.";
        } catch (PDOException $e) {
            throw new Exception("Error al importar la base de datos: " . $e->getMessage());
        }
    }

    public function prepare($query) {
        return $this->pdo->prepare($query);
    }
}

try {
    $servername = "tu_servidor_mysql";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "tu_base_de_datos";

    $importer = new DatabaseImporter($servername, $username, $password, $dbname);

    $sqlFile = 'ruta/al/archivo.sql';

    $importer->importSQL($sqlFile);

    $query = 'SELECT * FROM tabla1';
    $stmt = $importer->prepare($query);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print_r($resultados);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
