<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class ConciertosModel
{
    private $dbh;

    public function __construct()
    {
        //Instanciar la conexión que estará disponible en el modelo.
        $this->dbh = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'joyitas_andalucia', 'joyitas');
    }


    public function getListConciertos($idsConciertos = [])
    {
        try {
            if (!empty($idsConciertos)) {

                // Creamos una cadena de caracteres con el mismo número de ? que tiene el array de parámetros
                // Para crearlo usamos implode
                $arrConciertos = implode(',', array_fill(0, count($idsConciertos), '?'));

                // Corregir la consulta para incluir paréntesis alrededor de $arrConciertos
                $query = "SELECT * FROM conciertos WHERE id_concierto IN ($arrConciertos)";
                $stmt = $this->dbh->prepare($query);

                // Asignar los valores de las IDs
                foreach ($idsConciertos as $key => $id) {
                    $stmt->bindValue($key + 1, $id);
                }
            } else {
                $query = 'SELECT * FROM conciertos';
                $stmt = $this->dbh->prepare($query);
            }


            if (!$stmt->execute()) {
                throw new PDOException("Error executing query: " . implode(" ", $stmt->errorInfo()));
            }

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($idsConciertos) && empty($results)) {
                // Si se proporcionaron IDs de artistas pero no se encontró ningún resultado, mostrar un mensaje de error
                $errorIds = implode(', ', $idsConciertos);
                echo "No existen cantantes con las IDs: $errorIds";
            }

            return $results;
        } catch (PDOException $e) {
            // Manejo específico para excepciones relacionadas con la base de datos
            echo "Error en la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            // Otros manejos de excepciones generales
            echo "Error general: " . $e->getMessage();
        }
    }


    public function borrarConcierto($idConcierto)
    {

        try {
            $this->dbh->beginTransaction();
            //Eliminar conciertos del artista
            $queryConciertos = 'DELETE FROM conciertos where id_concierto = :id';

            $stmt = $this->dbh->prepare($queryConciertos);
            $stmt->bindParam(':id', $idConcierto, PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new Exception("Error al ejecutar la eliminacion del concierto: " . implode(" ", $stmt->errorInfo()));
            }
            $this->dbh->commit();
        } catch (Exception $e) {
            $this->dbh->rollBack();
            throw new Exception('Error al eliminar el concierto: ' . $e->getMessage());
        }
    }

   
}

