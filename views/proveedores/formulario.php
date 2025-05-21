
<div class="columnas-crear">
    <div class="columna">
        <div class="form-group">
            <label for="usuario">Nombre del Proveedor</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $proveedor->nombre; ?>" placeholder="Nombre proveedor">
        </div>
        <div class="form-group">
            <label for="marca">Apellido del Proveedor</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $proveedor->apellido; ?>" placeholder="Apellido Proveedor">
        </div>

        <div class="form-group">
            <label for="stock">Telefono</label>
            <input type="number" id="telefono" name="telefono" value="<?php echo $proveedor->telefono; ?>" placeholder="Telefono del proveedor">
        </div>
        <div class="form-group">
            <label for="precio">Correo</label>
            <input type="text" id="correo" name="correo" value="<?php echo $proveedor->correo; ?>" placeholder="Correo del proveedor">
        </div>
    </div>
</div>

<div class="fila">
    <div class="form-group form-out">
        <label class="crear-observacion" for="observaciones">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $proveedor->descripcion; ?>" placeholder="Descripcion">
    </div>
</div>