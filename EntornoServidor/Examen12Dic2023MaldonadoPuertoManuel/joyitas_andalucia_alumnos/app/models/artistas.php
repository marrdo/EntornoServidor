<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ArtistasModel
{
    private $dbh;
    public function __construct()
    {
        try {
            //Instanciar la conexión que estará disponible en el modelo.
            $this->dbh = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'joyitas_andalucia', 'joyitas');
        } catch (Exception $e) {
            $error = error_get_last();


            http_response_code(500);
            if(http_response_code(500) == 500){
                header('Location: ../app/views/error500.html');
            }
            
            echo '<pre>';
            echo '<br>';
            echo 'Error 500: Internal Server Error';
            echo '</pre>';

            error_log('No se pudo conectar a la base de datos: ' . $e->getMessage());
            
            // Capturar el error si no hay conexion
            die('No se pudo conectar a la base de datos. Por favor, inténtelo de nuevo más tarde.');
        }
    }



    
    public function getListArtistas($idArtista = [])
    {
        try {
            if (!empty($idArtista)) {
                // Creamos una cadena de caracteres con el mismo número de ? que tiene el array de parámetros
                // Para crearlo usamos implode
                $arrArtista = implode(',', array_fill(0, count($idArtista), '?'));

                // Corregir la consulta para incluir paréntesis alrededor de $arrArtista
                $query = "SELECT * FROM artistas WHERE id IN ($arrArtista)";
                $stmt = $this->dbh->prepare($query);

                // Asignar los valores de las IDs
                foreach ($idArtista as $key => $id) {
                    $stmt->bindValue($key + 1, $id);
                }
            } else {
                $query = 'SELECT * FROM artistas';
                $stmt = $this->dbh->prepare($query);
            }


            if (!$stmt->execute()) {
                throw new PDOException("Error executing query: " . implode(" ", $stmt->errorInfo()));
            }

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($idArtista) && empty($results)) {
                // Si se proporcionaron IDs de artistas pero no se encontró ningún resultado, mostrar un mensaje de error
                $errorIds = implode(', ', $idArtista);
                echo "No existen artistas con las IDs: $errorIds";
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

    public function borrarArtista($idArtista)
    {

        try {
            $this->dbh->beginTransaction();
            //Eliminar conciertos del artista
            $queryConciertos = 'DELETE FROM conciertos where id_artista = :id';

            $stmt = $this->dbh->prepare($queryConciertos);
            $stmt->bindParam(':id', $idArtista);

            if ($stmt->execute()) {
                $query = 'DELETE FROM artistas where id = :id';

                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':id', $idArtista, PDO::PARAM_INT);

                if (!$stmt->execute()) {
                    throw new Exception("Error al ejecutar la eliminacion del artista: " . implode(" ", $stmt->errorInfo()));
                }
            }
            $this->dbh->commit();
        } catch (Exception $e) {
            $this->dbh->rollBack();
            throw new Exception('Error al eliminar el artista: ' . $e->getMessage());
        }
    }


    public function guardarArtista($nombre, $genero, $fechaNac, $precioBolo, $localNac)
    {
        // INSERT INTO `cantantes` (`id`, `nombre`, `genero`, `fecha_nacimiento`, `precio_bolo`, `localidad_nacimiento`) VALUES (NULL, 'Manue', 'Rap', '2013-03-29', '43', 'Sevilla');
        $query = 'INSERT INTO artistas (id, nombre, genero, fecha_nacimiento, precio_bolo, localidad_nacimiento) 
    VALUES (null,:nombre, :genero, :fecha_nacimiento, :precio_bolo, :localidad_nacimiento)';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':fecha_nacimiento', $fechaNac);
        $stmt->bindParam(':precio_bolo', $precioBolo);
        $stmt->bindParam(':localidad_nacimiento', $localNac);

        // Intentamos ejecutar la consulta
        if (!$stmt->execute()) {
            // Si hay un error, lanzamos una excepción con el mensaje de error
            throw new Exception('Error al guardar el artista: ' . implode(" ", $stmt->errorInfo()));
        }
    }
}
