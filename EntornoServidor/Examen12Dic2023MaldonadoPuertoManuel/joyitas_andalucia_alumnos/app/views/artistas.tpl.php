<?php
include('../app/views/includes/header.tpl.php');
?>
<ul>
    <?php foreach ($lista_artistas as $artista) : ?>
        <li><?php echo $artista['nombre']; ?>
            <a href=".?path=artistas/eliminar/<?php echo $artista['id']; ?>">
                <button type="button">💀</button>
            </a>
            
        </li>
    <?php endforeach; ?>

</ul>
<p><a href=".?path=artistas/crear">Incluir artista</a></p>
<?php
include('../app/views/includes/footer.tpl.php');
?>