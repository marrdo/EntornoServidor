<?php
include('../app/views/includes/header.tpl.php');
?>
<form action="index.php?path=artistas/guardar" id="formCreate" method="POST">
    <fieldset>
        <legend>Datos del nuevo cantante</legend>
        <label >Nombre: <input type="text" name="nombreCantante" id=""></label>
        <label >Genero: <input type="text" name="generoCantante" id=""></label>
        <label >Fecha nacimiento: <input type="date" name="fechNacCatante" id=""></label>
        <label >Precio bolo: <input type="number" name="precioBoloCantante" id=""></label>
        <label >Localidad nacimiento: <input type="text" name="LocalidadNacimientoCantante" id=""></label>
    </fieldset>
    <button type="submit" name="crearCantante">Insertar cantante</button>
</form>
<?php
include('../app/views/includes/footer.tpl.php');
?>