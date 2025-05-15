
<form id="formulario-producto" action="/productos/update?id=<?php echo $producto->id_producto; ?>" method="POST">
    <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto; ?>">
    <a href="/admin" id="cerrar" class="send-form button">Cerrar</a>
    <div class="iventary-header inv-form">
        <h2>Antualizacion de Producto</h2>
        <button type="submit" class="send-form button">Actualizar</button>
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