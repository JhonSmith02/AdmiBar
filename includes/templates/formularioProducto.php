<div class="columnas-crear">
    <div class="columna">
        <div class="form-group">
            <label for="usuario">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre producto">
        </div>
        <div class="form-group">
            <label for="marca">Marca del producto</label>
            <input type="text" id="marca" name="marca" placeholder="Marca del producto">
        </div>

        <div class="form-group">
            <label for="stock">Iva</label>
            <input type="number" id="iva" name="iva" placeholder="Impuesto Iva">
        </div>
        <div class="form-group">
            <label for="precio">Precio del Producto</label>
            <input type="number" id="precio" name="precio" placeholder="Precio producto">
        </div>
    </div>
    <div class="columna">
        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select id="proveedor_id_proveedor" name="proveedor_id_proveedor">
                <option value="" disabled selected>Selecciona Proveedor</option>
                <?php foreach ($proveedor as $row): ?>

                    <option value="<?php echo $row['id_proveedor']; ?>"><?php echo $row['nombre']; echo $row['apellido']; ?></option>

                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tipo">Categoria Producto</label>
            <select id="categoria_id_categoria" name="categoria_id_categoria">
                <option value="" disabled selected>Selecciona Categoria</option>
                <?php foreach ($categoria as $row) : ?>

                    <option value="<?php echo $row['id_categoria']; ?>"> <?php echo $row['nombre']; ?></option>

                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<div class="fila">
    <div class="form-group form-out">
        <label class="crear-observacion" for="observaciones">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion">
    </div>
</div>