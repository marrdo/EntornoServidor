<?php
include('../app/views/includes/header.tpl.php');
?>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Fecha nacimiento</th>
            <th>Precio concierto</th>
            <th>Localidad nacimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_artistas as $artista) : ?>
            <tr>
                <td><?php echo $artista['nombre']; ?></td>
                <td><?php echo $artista['genero']; ?></td>
                <td><?php echo $artista['fecha_nacimiento']; ?></td>
                <td><?php echo $artista['precio_bolo']; ?>€</td>
                <td><?php echo $artista['localidad_nacimiento']; ?></td>
                <td>
                    <form action="index.php?path=artistas/eliminar" method="POST">
                        <button type="submit" name="eliminarCantante" value="<?php echo $artista['id']; ?>">Eliminar</button>
                    </form>
                    <form action="index.php?path=artistas/update" method="POST">
                        <button type="submit" name="actualizarCantante" value="<?php echo $artista['id']; ?>">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
include('../app/views/includes/footer.tpl.php');
?>