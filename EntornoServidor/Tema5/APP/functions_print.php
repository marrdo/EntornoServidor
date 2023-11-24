<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db_config.php');


function cargarDatos($results)
{       
        $output = '<h1>Gestionar artistas</h1>';
        $output .= '<div class="botones">
        <button type="button" name="incorporacion">Incorporar cantante</button>
        <button type="button" name="listar">Ver todos los cantantes</button>
    </div>';
        //Comenzaremos usando una variable apra almacenar las cadenas de texto
        //y es la variable que retornaremos depsues de cargar los datos de results
        $output .= '<section class="modificar"><h3>Listado de cantantes</h3>';
        if ($results->num_rows > 0) {
                $output .= '<form action="artista.php" method="POST" enctype="multipart/form-data">';
                while ($row = $results->fetch_assoc()) {
                        $output .= '<article class="cantante">';
                        $output .= ' <fieldset>
                       <legend>' . $row['nombre'] . '</legend>
                       <label for="">Nombre: <input type="text" name="' . $row['id'] . '[]" value="' . $row['nombre'] . '"></label>
                        <label for="">Genero musical: <input type="text" name="' . $row['id'] . '[]"  value="' . $row['genero'] . '"></label>
                        <label for="">Fecha de Nacimiento: <input type="date" name="' . $row['id'] . '[]"  value="' . $row['fecha_nacimiento'] . '"></label>
                        <label for="">Precio bolo: <input type="number" name="' . $row['id'] . '[]" value="' . $row['precio_bolo'] . '"></label>
                        <label for="">Localidad: <input type="text" name="' . $row['id'] . '[]" value="' . $row['localidad_nacimiento'] . '"></label>
                       </fieldset><br>
                       <button type="submit" name="actualizar" value="' . $row['id'] . '">Actualizar</button>
                        <button type="submit" name="borrar" value="' . $row['id'] . '">💀 Borrar artista 💀</button>
                       ';
                        $output .= '</article>';
                }
                $output .= '</form></section>';
        } else {
                $output .= '<h4>No hay cantantes en la base de datos.</h4></section>';
        }

        $output .= '<section class="incorporar">
        <h3>Incorporar cantante</h3>
            <form action="artista.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Datos del nuevo cantante</legend>
                    <label for="nombre">Nombre: <input type="text" name="nombre" ></label>
                    <label for="genero">Genero musical: <input type="text" name="genero" ></label>
                    <label for="fechNacimiento">Fecha de Nacimiento: <input type="date" name="fechNacimiento"
                            ></label>
                    <label for="precioBolo">Precio bolo: <input type="number" name="precioBolo" ></label>
                    <label for="localidad">Localidad: <input type="text" name="localidad" ></label>
                </fieldset>
                <button type="submit" name="incorporar">Incorporar cantante ✅</button>
            </form>
        </article>
    </section>';
        return $output;
}

