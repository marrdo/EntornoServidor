<?php
include('../app/views/includes/header.tpl.php');
?>

<table>
    <thead>
        <tr>
            <th>Artista</th>
            <th>Lugar</th>
            <th>Aforo</th>
            <th>Precio entradas</th>
            <th>Hora</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_conciertos as $concierto) : ?>
            <tr>
                <td><?php echo $concierto['nombre_artista']; ?></td>
                <td><?php echo $concierto['lugar']; ?></td>
                <td><?php echo $concierto['aforo']; ?></td>
                <td><?php echo $concierto['precio_entradas']; ?>€</td>
                <td><?php echo $concierto['hora']; ?></td>
                <td>
                    <a href="index.php?path=conciertos/eliminar/<?php echo $concierto['id']; ?>"><button type="button" value="<?php echo $concierto['id']; ?>">Eliminar</button></a>
                    <a href="index.php?path=conciertos/update/<?php echo $concierto['id']; ?>"> <button type="button" name="actualizarCconcierto" value="<?php echo $concierto['id']; ?>">Actualizar</button></a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
include('../app/views/includes/footer.tpl.php');
?>