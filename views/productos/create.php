
<form id="formulario-producto" action="/productos/create" method="POST">
    <a href="/admin" id="cerrar" class="send-form button">Cerrar</a>
    <div class="iventary-header inv-form">
        <h2>Registro de producto</h2>
        <button type="submit" class="send-form button">Crear</button>
    </div>
    <?php include __DIR__ . '/formulario.php'; ?>
</form>

<?php foreach($errors as $row): ?>
    <div class="alerta error" style=" background-color:red; ">
        <?php echo $row; ?>
    </div>
<?php endforeach; ?>

<!-- Mensaje de exito que llega del modelo -->
<?php $msg = $_GET['msg'] ?? null; ?>

<?php if (intval($msg) === 1): ?> 
    <span class="alerta exito" style="background-color: green;">Producto Creado Correctamente</span>
<?php elseif (intval($msg) === 2): ?>
    <span class="alerta exito">Producto Actualizado</span>
<?php endif; ?>