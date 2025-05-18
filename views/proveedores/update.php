
<form id="formulario-producto" action="/proveedores/update?id=<?php echo $proveedor->id_proveedor; ?>" method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $proveedor->id_proveedor; ?>">
    <a href="/proveedores/admin" id="cerrar" class="send-form button">Cerrar</a>
    <div class="iventary-header inv-form">
        <h2>Registro de Proveedores</h2>
        <button type="submit" class="send-form button">Crear</button>
    </div>
    <?php include __DIR__ . '/formulario.php'; ?>
</form>

<div class="mensaje-contenedor">
    <?php if(!empty($errors)): ?>
        <div class="list-errores">
            <?php foreach($errors as $error): ?>
                <div class="msg error">
                    <span class="mensaje-texto"><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php $msg = $_GET['msg'] ?? null; ?>
    <?php if (intval($msg) === 1): ?> 
        <div class="msg exito">
            <span class="mensaje-texto">Producto Creado Correctamente</span>
        </div>
    <?php elseif (intval($msg) === 2): ?>
        <div class="msg exito">
            <span class="mensaje-texto">Producto Actualizado</span>
        </div>
    <?php endif; ?>
</div>