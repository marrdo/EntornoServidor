<?php
include('../app/views/includes/header.tpl.php');
?>

<form action="index.php?path=artistas/actualizacion" method="POST" id="formCreate" enctype="multipart/form-data">
<fieldset>
        <legend>Datos de <?php print($artistaParaActualizar[0]['nombre'])?></legend>
        <label >Nombre: <input type="text" name="nombreCantante" value="<?php print($artistaParaActualizar[0]['nombre'])?>"></label>
        <label >Genero: <input type="text" name="generoCantante" value="<?php print($artistaParaActualizar[0]['genero'])?>"></label>
        <label >Fecha nacimiento: <input type="date" name="fechNacCatante" value="<?php print($artistaParaActualizar[0]['fecha_nacimiento'])?>"></label>
        <label >Precio bolo: <input type="number" name="precioBoloCantante" value="<?php print($artistaParaActualizar[0]['precio_bolo'])?>" ></label>
        <label >Localidad nacimiento: <input type="text" name="localidadNacimientoCantante" value="<?php print($artistaParaActualizar[0]['localidad_nacimiento'])?>" ></label>
        <!-- Voy a probar a meter un input hidden para pasar el id -->
        <input type="hidden" name="idCantante" value="<?php print($artistaParaActualizar[0]['id'])?>">
    </fieldset>
    <button type="submit" name="updateCantante">Actualizar</button>
</form>
<?php
include('../app/views/includes/footer.tpl.php');
?>
