<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class conciertosModel
{
    private $dbh;

    public function __construct()
    {
        //Instanciar la conexión que estará disponible en el modelo.
        $this->dbh = new PDO('mysql:host=localhost;dbname=joyitas_andalucia', 'joyitas_andalucia', 'joyitas');
    }


    public function getListconciertos($idsconciertos = [])
    {
        try {
            if (!empty($idsconciertos)) {

                // Creamos una cadena de caracteres con el mismo número de ? que tiene el array de parámetros
                // Para crearlo usamos implode
                $arrconciertos = implode(',', array_fill(0, count($idsconciertos), '?'));

                // Corregir la consulta para incluir paréntesis alrededor de $arrconciertos
                $query = "SELECT * FROM conciertos WHERE id_concierto IN ($arrconciertos)";
                $stmt = $this->dbh->prepare($query);

                // Asignar los valores de las IDs
                foreach ($idsconciertos as $key => $id) {
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

            if (!empty($idsconciertos) && empty($results)) {
                // Si se proporcionaron IDs de artistas pero no se encontró ningún resultado, mostrar un mensaje de error
                $errorIds = implode(', ', $idsconciertos);
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
            $queryconciertos = 'DELETE FROM conciertos where id_concierto = :id';

            $stmt = $this->dbh->prepare($queryconciertos);
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

    public function guardarConcierto($nombreArtista, $fecha, $lugar, $aforo, $precioEntrada, $hora)
    {
        try {
            // Consulta para obtener el ID del artista en base al nombre
            $queryObtenerIdArtista = 'SELECT id FROM cantantes WHERE nombre = :nombreArtista';
            $stmtObtenerIdArtista = $this->dbh->prepare($queryObtenerIdArtista);
            $stmtObtenerIdArtista->bindParam(':nombreArtista', $nombreArtista);
            
            if (!$stmtObtenerIdArtista->execute()) {
                throw new PDOException("Error executing query: " . implode(" ", $stmtObtenerIdArtista->errorInfo()));
            }
    
            $idArtista = $stmtObtenerIdArtista->fetchColumn();
    
            // Consulta para insertar el concierto con el ID del artista obtenido
            $queryInsertarConcierto = 'INSERT INTO conciertos (id, artista, fecha, lugar, aforo, precio_entradas, hora) 
            VALUES (null, :idArtista, :fecha, :lugar, :aforo, :precio_entradas, :hora)';
            
            $stmtInsertarConcierto = $this->dbh->prepare($queryInsertarConcierto);
            $stmtInsertarConcierto->bindParam(':idArtista', $idArtista);
            $stmtInsertarConcierto->bindParam(':fecha', $fecha);
            $stmtInsertarConcierto->bindParam(':lugar', $lugar);
            $stmtInsertarConcierto->bindParam(':aforo', $aforo);
            $stmtInsertarConcierto->bindParam(':precio_entradas', $precioEntrada);
            $stmtInsertarConcierto->bindParam(':hora', $hora);
    
            if (!$stmtInsertarConcierto->execute()) {
                throw new PDOException("Error executing query: " . implode(" ", $stmtInsertarConcierto->errorInfo()));
            }
    
            // Redireccionamos al usuario a la lista de conciertos después de guardar
            header('Location: index.php?path=conciertos/listar');
            exit();
        } catch (PDOException $e) {
            // Manejo específico para excepciones relacionadas con la base de datos
            echo "Error en la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            // Otros manejos de excepciones generales
            echo "Error general: " . $e->getMessage();
        }
    }

    public function capturarDatos($idConcierto)
    {
        try {
    
            $query = 'SELECT * FROM conciertos WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $idConcierto[0], PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                // Verifica si hay resultados antes de intentar obtenerlos
                if ($stmt->rowCount() > 0) {
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                    return $results;
                } else {
                    echo 'No se encontraron resultados para el ID: ' . $idConcierto;
                }
            } else {
                throw new PDOException("Error  query: " . implode(" ", $stmt->errorInfo()));
            }
        } catch (PDOException $e) {
            // Manejo específico para excepciones relacionadas con la base de datos
            echo "Error en la base de datos: " . $e->getMessage();
            return false; 
        } catch (Exception $e) {
            
            echo "Error general: " . $e->getMessage();
            return false;
        }
    }
   
}

