
<div class="columnas-crear">
    <div class="columna">
        <div class="form-group">
            <label for="usuario">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $producto->nombre; ?>" placeholder="Nombre producto">
        </div>
        <div class="form-group">
            <label for="marca">Marca del producto</label>
            <input type="text" id="marca" name="marca" value="<?php echo $producto->marca; ?>" placeholder="Marca del producto">
        </div>

        <div class="form-group">
            <label for="stock">Iva</label>
            <input type="number" id="iva" name="iva" value="<?php echo $producto->iva; ?>" placeholder="Impuesto Iva">
        </div>
        <div class="form-group">
            <label for="precio">Precio del Producto</label>
            <input type="number" id="precio" name="precio" value="<?php echo $producto->precio; ?>" placeholder="Precio producto">
        </div>
    </div>
    <div class="columna">
        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select id="proveedor_id_proveedor" name="proveedor_id_proveedor">
                <option value="" disabled selected>Selecciona Proveedor</option>
                <?php foreach ($proveedores as $row): ?>

                    <option <?php echo $producto->proveedor_id_proveedor == $row->id_proveedor ? 'selected' : ''; ?> value="<?php echo $row->id_proveedor; ?>"> <?php echo $row->nombre;?> <?php echo $row->apellido; ?> </option>

                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tipo">Categoria Producto</label>
            <select id="categoria_id_categoria" name="categoria_id_categoria">
                <option value="" disabled selected>Selecciona Categoria</option>
                <?php foreach ($categorias as $row) : ?>

                    <option <?php echo $producto->categoria_id_categoria == $row->id_categoria ? 'selected' : ''; ?> value="<?php echo $row->id_categoria; ?>"> <?php echo $row->nombre; ?></option>

                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<div class="fila">
    <div class="form-group form-out">
        <label class="crear-observacion" for="observaciones">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $producto->descripcion; ?>" placeholder="Descripcion">
    </div>
</div>