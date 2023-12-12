<?php
include('../app/views/includes/header.tpl.php');
?>

<!-- Trabajar con $lista_conciertos -->
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha hora</th>
            <th>Artista</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_conciertos as $concierto) : ?>
            <tr>
                <td><?php echo $concierto['nombre']; ?></td>
                <td><?php echo $concierto['fecha_hora']; ?></td>
                <td><?php echo $concierto['id_artista']; ?></td>
                <td>
                        <a href=".?path=conciertos/eliminar/<?php echo $concierto['id_concierto']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
include('../app/views/includes/footer.tpl.php');
?>"