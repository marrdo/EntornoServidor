<?php
include('../app/views/includes/header.tpl.php');
?>
<ul>
    <?php foreach($lista_artistas as $artista): ?>
        <li><a href=".?path=artistas/ver/<?php echo $artista['id']; ?>"><?php echo $artista['nombre']; ?></a></li><button type="button"><a href=".?path=artistas/eliminar/<?php echo $artista['id']; ?>">💀</a></button>
    <?php endforeach; ?>

</ul>
<p><a href=".?path=artistas/crear">Incluir artista</a></p>
<?php
include('../app/views/includes/footer.tpl.php');
?>
