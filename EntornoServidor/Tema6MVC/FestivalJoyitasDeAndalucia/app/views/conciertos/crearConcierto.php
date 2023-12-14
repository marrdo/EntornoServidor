<?php
include('../app/views/includes/header.tpl.php');
?>
<form action="index.php?path=conciertos/guardar" id="formCreate" method="POST">
    <fieldset>
        <legend>Datos del nuevo concierto</legend>
        <label >Nombre artista: <input type="text" name="nombreArtista" id=""></label>
        <label >Fecha: <input type="date" name="fechaConcierto" id=""></label>
        <label >Lugar: <input type="text" name="lugarConcierto" id=""></label>
        <label >Aforo: <input type="date" name="aforoConcierto" id=""></label>
        <label >Precio entradas: <input type="number" name="precioEntradaConcierto" id=""></label>
        <label >Hora: <input type="text" name="horaConcierto" id=""></label>
    </fieldset>
    <button type="submit" name="crearConcierto">Crear concierto</button>
</form>
<?php
include('../app/views/includes/footer.tpl.php');
?>