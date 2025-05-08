
<!-- Mensaje de exito que llega del modelo -->
<?php if (intval($msg) === 1): ?> 
    
    <span class="alerta exito">Producto Creado Correctamente</span>
<?php elseif (intval($msg) === 2): ?>
    <span class="alerta exito">Producto Actualizado</span>
<?php endif; ?>



<form id="formulario-producto" action="productos/crear.php" method="POST">
    <button type="button" id="cerrar" class="send-form button">Cancelar</button>
    <div class="iventary-header inv-form">
        <h2>Registro de producto</h2>
        <button type="submit" class="send-form button">Crear</button>
    </div>
    <?php include __DIR__ . '/formulario.php'; ?>
</form>