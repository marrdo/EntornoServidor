<?php

class DatabaseImporter {
    private $pdo;

    public function __construct($servername, $username, $password, $dbname) {
        try {
            $this->pdo = new PDO("mysql:host=$servername", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Crear la base de datos si no existe
            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
            $this->pdo->exec("USE $dbname");
        } catch (PDOException $e) {
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
    }

    public function importSQL($sqlFile) {
        try {
            $sql = file_get_contents($sqlFile);
            $this->pdo->exec($sql);
            echo "Base de datos importada correctamente.";
        } catch (PDOException $e) {
            throw new Exception("Error al importar la base de datos: " . $e->getMessage());
        }
    }

    public function prepare($query) {
        try {
            return $this->pdo->prepare($query);
        } catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
    }

    public function beginTransaction() {
        $this->pdo->beginTransaction();
    }

    public function executeStatement($stmt) {
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->errorInfo()[2]);
        }
    }

    public function commit() {
        $this->pdo->commit();
    }

    public function rollBack() {
        $this->pdo->rollBack();
    }
}

// Uso del importador de base de datos
$servername = "tu_servidor_mysql";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

try {
    $importer = new DatabaseImporter($servername, $username, $password, $dbname);

    // Ruta al archivo SQL que deseas importar
    $sqlFile = 'ruta/al/archivo.sql';

    // Importar la base de datos desde el archivo SQL
    $importer->importSQL($sqlFile);

    // Ejemplo de consulta UPDATE después de la importación
    $tableName = "tabla1";
    $idToUpdate = 1;
    $newValue = "Nuevo Valor";

    // Comenzar la transacción
    $importer->beginTransaction();

    try {
        $query = "UPDATE $tableName SET columna1 = :newValue WHERE id = :id";
        $stmt = $importer->prepare($query);

        // Blindar los parámetros con bindParam
        $stmt->bindParam(':newValue', $newValue, PDO::PARAM_STR);
        $stmt->bindParam(':id', $idToUpdate, PDO::PARAM_INT);

        
        // Ejecutar la consulta
        $importer->executeStatement($stmt);

        // Confirmar la transacción
        $importer->commit();

        echo "Actualización realizada correctamente.";
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $importer->rollBack();
        throw new Exception("Error: " . $e->getMessage());
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
