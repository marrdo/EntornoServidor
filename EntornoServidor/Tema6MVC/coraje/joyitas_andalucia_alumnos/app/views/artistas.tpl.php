<?php
include('../app/views/includes/header.tpl.php');
?>
<ul>
    <?php foreach($artistas as $artista): ?>
        <li><a href=".?path=artistas/ver/<?php echo $artista['id']; ?>"><?php echo $artista['nombre']; ?></a></li>
    <?php endforeach; ?>

</ul>
<?php
include('../app/views/includes/footer.tpl.php');
?>
