<?php
include('../app/views/includes/header.tpl.php');
?>

<form action="index.php?path=conciertos/actualizacion" method="POST" id="formCreate" enctype="multipart/form-data">
<fieldset>
        <legend>Datos del concierto de <?php print($conciertoParaActualizar[0]['artista'])?></legend>
        <label >Nombre artista: <input type="text" name="nombreArtistas" value="<?php print($conciertoParaActualizar[0]['artista'])?>"></label>
        <label >Fecha: <input type="date" name="fecha" value="<?php print($conciertoParaActualizar[0]['fecha'])?>"></label>
        <label >Lugar: <input type="text" name="lugar" value="<?php print($conciertoParaActualizar[0]['lugar'])?>"></label>
        <label >Aforo: <input type="number" name="aforo" value="<?php print($conciertoParaActualizar[0]['aforo'])?>" ></label>
        <label >Precio de la entrada: <input type="text" name="precioEntrada" value="<?php print($conciertoParaActualizar[0]['precio_entradas'])?>" ></label>
        <label >Hora: <input type="date-time" name="hora" value="<?php print($conciertoParaActualizar[0]['hora'])?>" ></label>
        <!-- Voy a probar a meter un input hidden para pasar el id -->
        <input type="hidden" name="idConcierto" value="<?php print($conciertoParaActualizar[0]['id'])?>">
    </fieldset>
    <button type="submit" name="updateConciertos">Actualizar</button>
</form>
<?php
include('../app/views/includes/footer.tpl.php');
?>