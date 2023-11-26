<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db_config.php');


function cargarDatos($dbh)
{
    $query = 'SELECT * FROM cantantes';
    $results = $dbh->query($query);

    //Comenzaremos usando una variable apra almacenar las cadenas de texto
    //y es la variable que retornaremos depsues de cargar los datos de results
    $output = '<h1>Gestionar artistas</h1>';
    $output .= '<section class="botones">
                    <button type="button" name="incorporacion">Incorporar cantante</button>
                    <form action="conciertos.php" method="POST" enctype="multipart/form-data">
                        <button type="submit" name="verTodosLosConciertos" value="Ver conciertos">Ver todos los conciertos</button>
                    </form>
                </section>';
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
                </section>';
    $output .= '<section class="listar"><h3>Cantantes</h3>';

    if ($results->num_rows > 0) {
        $output .= '<table><caption>Lista de cantantes</caption>';
        $output .= '<thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Genero musical</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Precio bolo</th>
                            <th>Localidad</th>
                            <th class="accione">Acciones</th>
                        </tr>
                    </thead>';
        $output .= '<tbody>';

        while ($cantante = $results->fetch_assoc()) {
            $output .= '<tr>';
            $output .= '<td class="' . $cantante['id'] . '">' . htmlspecialchars($cantante['nombre']) . '</td>';
            $output .= '<td class="' . $cantante['id'] . '">' . htmlspecialchars($cantante['genero']) . '</td>';
            $output .= '<td class="' . $cantante['id'] . '">' . htmlspecialchars($cantante['fecha_nacimiento']) . '</td>';
            $output .= '<td class="' . $cantante['id'] . '">' . htmlspecialchars($cantante['precio_bolo']) . '€</td>';
            $output .= '<td class="' . $cantante['id'] . '">' . htmlspecialchars($cantante['localidad_nacimiento']) . '</td>';
            $output .= '<td class="accione">
                            <form action="artista.php" class="botonesForm" method="POST" enctype="multipart/form-data">
                            <button type="submit" name="actualizar" value="' . $cantante['id'] . '" title="Editar Artista">📝</button>
                            <button type="submit" name="borrar" value="' . $cantante['id'] . '" title="Eliminar artista">💀 </button>
                            </form>
                            <form action="conciertos.php" class="botonesForm" method="POST" enctype="multipart/form-data">
                            <button type="submit" name="verConciertos" value="' . $cantante['id'] . '" title="Ver conciertos">🎤</button>
                            </form>
                        </td>';
            $output .= '</tr>';
        }

        $output .= '</tbody>';
        $output .= '</table>';
    } else {
        $output .= '<h3>No hay cantantes en la base de datos.</h3>';
    }

    $output .= '</section>';



    return $output;
}

function mostrarFormActualizar($cantante)
{
    $output = '<h2>Actualizar a ' . $cantante['nombre'] . '</h2>';
    $output .= '<section class="modificar">';
    $output .= '<form action="artista.php" method="POST" enctype="multipart/form-data">';
    $output .= '<article class="cantante">';
    $output .= ' <fieldset>
                       <legend>' . $cantante['nombre'] . '</legend>
                       <label for="">Nombre: <input type="text" name="nombre" value="' . $cantante['nombre'] . '"></label>
                        <label for="">Genero musical: <input type="text" name="genero"  value="' . $cantante['genero'] . '"></label>
                        <label for="">Fecha de Nacimiento: <input type="date" name="fecha_nacimiento"  value="' . $cantante['fecha_nacimiento'] . '"></label>
                        <label for="">Precio bolo: <input type="number" name="precio_bolo" value="' . $cantante['precio_bolo'] . '"></label>
                        <label for="">Localidad: <input type="text" name="localidad_nacimiento" value="' . $cantante['localidad_nacimiento'] . '"></label>
                       </fieldset><br>
                       <button type="submit" name="formActualizar" value="' . $cantante['id'] . '">Actualizar</button>
                       ';
    $output .= '</article>';

    $output .= '</form></section>';

    return $output;
}

function mostraractualizacion($nombre)
{
    return '
    <div class="informacion">
    <h3>Se actualizó el cantante ' . $nombre . '</h3>
    </div>
    ';
}

function mostrarBorrado($nombre)
{
    return '<div class="informacion">
    <h3>Se borró al cantante ' . $nombre . '</h3>
    </div>';
}

function mostrarIncorporacion($nombre)
{

    return '<div class="informacion">
    <h3>Se incorporó al cantante ' . $nombre . '</h3>
    </div>';
}
/*  ///////////////////////// CONCIERTOS  /////////////////////////////   */

function mostrarTodosLosConciertos($dbh)
{

    $query = 'SELECT * FROM Conciertos';
    $stmt = $dbh->prepare($query);

    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $dbh->error);
    }

    $stmt->execute();

    $results = $stmt->get_result();

    $output = '<section class="listaConciertos">
                <h1>Conciertos</h1>
                <article>
                <form action="artista.php" method="POST" enctype="multipart/form-data">
                    <button type="submit" name="mostrarCantantes" title="Ver el listado de cantantes">Ver artistas</button>
                    <button type="button" name="aniadirConcierto">Añadir concierto</button>
                </form>
                </article>
                <article class="incorporar">
                    <h3>Añadir concierto</h3>
                    <form action="conciertos.php" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Datos del nuevo concierto</legend>
                            <label>Nombre artista: <input type="text" name="nombre"></label>
                            <label>Fecha: <input type="date" name="fecha"></label>
                            <label>Lugar: <input type="text" name="lugar"></label>
                            <label>Aforo: <input type="number" name="aforo"></label>
                            <label>Precio: <input type="number" name="precio"></label>
                            <label>Hora: <input type="time" name="hora"></label>
                        </fieldset>
                        <button type="submit" name="incorporarConcierto">Añadir concierto✅</button>
                    </form>
                </article>
                ';
    if ($results->num_rows > 0) {
        $output .= ' <table>
                    <caption>Detalles de conciertos</caption>
                    <thead>
                        <tr>
                            <th>Cantante</th>
                            <th>Fecha</th>
                            <th>Lugar</th>
                            <th>Aforo</th>
                            <th>Precio entrada/U</th>
                            <th>Hora</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($concierto = $results->fetch_assoc()) {
            $cantante = encontrarCantante($dbh, $concierto['artista']);
            $output .= '<tr>
            <td>' . $cantante['nombre'] . '</td>
            <td>' . $concierto['fecha'] . '</td>
            <td>' . $concierto['lugar'] . '</td>
            <td>' . $concierto['aforo'] . '</td>
            <td>' . $concierto['precio_entradas'] . '€</td>
            <td>' . $concierto['hora'] . '</td>
            <td><form action="conciertos.php" method="post">
                <button type="submit" name="actualizarConcierto" title="Actualizar datos del concierto" value="' . $concierto['id'] . '">📝</button>
                <button type="submit" name="borrarConcierto" title="Borrar el concierto" value="' . $concierto['id'] . '">🏴‍☠️</button>
                </form>
            </td>
        </tr>';
        }
        $output .= '</tbody></section>';
    } else {
        $output .= '<h2>No hay conciertos programados.</h2>';
    }
    return $output;
}

function mostrarConciertoCantante($dbh, $idCantante)
{

    $cantante = encontrarCantante($dbh, $idCantante);

    $query = 'SELECT * FROM Conciertos WHERE artista=?';
    $stmt = $dbh->prepare($query);

    $stmt->bind_param('i', $idCantante);

    $stmt->execute();

    $results = $stmt->get_result();

    $output = '<section class="listaConciertos">
                <h1>Conciertos</h1>
                <article>
                    <form action="artista.php" method="POST" enctype="multipart/form-data">
                        <button type="submit" name="mostrarCantantes" title="Ver el listado de cantantes">Ver artistas</button>
                    </form>
                    <form action="conciertos.php" method="post">
                        <button title="Ver todos los conciertos" type="submit" name="verTodosLosConciertos" >Ver todos los conciertos</button>    
                    </form>
                </article>';
    if ($results->num_rows > 0) {
        $output .= ' <table>
        <caption>Detalles de conciertos</caption>
        <thead>
            <tr>
                <th>Cantante</th>
                <th>Fecha</th>
                <th>Lugar</th>
                <th>Aforo</th>
                <th>Precio entrada/U</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>';
        while ($concierto = $results->fetch_assoc()) {
            $cantante = encontrarCantante($dbh, $concierto['artista']);
            $output .= '<tr>
                            <td>' . $cantante['nombre'] . '</td>
                            <td>' . $concierto['fecha'] . '</td>
                            <td>' . $concierto['lugar'] . '</td>
                            <td>' . $concierto['aforo'] . '</td>
                            <td>' . $concierto['precio_entradas'] . '€</td>
                            <td>' . $concierto['hora'] . '</td>
                            <td><form action="conciertos.php" method="post">
                                <button type="submit" name="actualizarConcierto" title="Actualizar datos del concierto" value="' . $concierto['id'] . '">📝</button>
                                <button type="submit" name="borrarConcierto" title="Borrar el concierto" value="' . $concierto['id'] . '">🏴‍☠️</button>
                                </form>
                            </td>
                        </tr>';
        }
        $output .= '</tbody></section>';
    } else {
        $output .= '<h2>No hay conciertos programados.</h2>';
    }
    return $output;
}

function modificarConcierto($dbh,$idConcierto)
{

    $concierto = encontrarConcierto($dbh,$idConcierto);
    $cantante = encontrarCantante($dbh,$concierto['artista']);

    $output = '<section class="formConcierto">
    <form action="conciertos.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Concierto de '.$cantante['nombre'].'</legend>
            <label>Artista: <input type="text" name="nombreArtista" value="'.$cantante['nombre'].'"></label>
            <label>Fecha: <input type="date" name="fechaConcierto" value="'.$concierto['fecha'].'"></label>
            <label>Lugar: <input type="text" name="lugarConcierto" value="'.$concierto['lugar'].'"></label>
            <label>Aforo: <input type="number" name="aforoConcierto" value="'.$concierto['aforo'].'"></label>
            <label>Precio entrada: <input type="number" name="precioConcierto" value="'.$concierto['precio_entradas'].'"></label>
            <label>Hora: <input type="datetime" name="horaConcierto" value="'.$concierto['hora'].'"></label>
        </fieldset>
        <button type="submit" name="actualizarConciertoFormulario" value="'.$concierto['id'].'">Actualizar</button>
    </form>
    </section>';

    return $output;
    
}

function conciertoActualizado($nombre){
    return '
    <div class="informacion">
    <h3>Se actualizó el concierto de ' . $nombre . '</h3>
    </div>';
}

function mostrarIconporacion($nombre){
    return '<div class="informacion">
    <h3>Se incorporó el concierto de ' . $nombre . '</h3>
    </div>';
}