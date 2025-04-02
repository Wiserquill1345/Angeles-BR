<fieldset>
    <legend>Informacion General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="nombre Vendedor(a)" value="<?php echo s($vendedor->nombre);?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="apellido Vendedor(a)" value="<?php echo s($vendedor->apellido);?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono:</label>
    <input type="number" id="telefono" name="vendedor[telefono]" placeholder="telefono Vendedor(a)" value="<?php echo s($vendedor->telefono);?>">

</fieldset>