<div class="inventary-contain">
    <div class="iventary-header">
        <h2>INVENTARIO</h2>
        <a href="/productos/create" id="openModal" class="button but-register">+ REGISTRAR </a>
    </div>

    <div class="search-inv">
        <div class="buscador">
            <span class="material-symbols-outlined">
                search
            </span>
            <input type="text" placeholder=" Buscar producto" class="serch-inventory">
        </div>

    </div>

    <table class="tabla-productos">
        <thead>
            <tr>
                <th># ID</th>
                <th>NOMBRE</th>
                <th>MARCA</th>
                <th>PRECIO</th>
                <th>IVA</th>
                <th>DESCRIPCION</th>
                <th>CATEGORIA</th>
                <th>PROVEEDOR</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($productos as $row): ?>
                <tr>
                    <td>
                        <?php echo $row->id_producto; ?>
                    </td>
                    <td>
                        <?php echo $row->nombre; ?>
                    </td>
                    <td>
                        <?php echo $row->marca; ?>
                    </td>
                    <td>
                        <?php echo $row->precio; ?>
                    </td>
                    <td>
                        <?php echo $row->iva; ?>
                    </td>
                    <td>
                        <?php echo $row->descripcion; ?>
                    </td>
                    <td>
                        <?php echo $row->categoria_id_categoria; ?>
                    </td>
                    <td>
                        <?php echo $row->proveedor_id_proveedor; ?>
                    </td>
                    <td>
                        <button class="btn editar editar-prod"><i class="icon-pencil"><img
                        src="/images/4213598-doodle-education-line-pen-pencil-school-science_115491.ico"
                                    alt=""></i></button>
                        <button class="btn eliminar delete-prod"><i class="icon-delete"><img
                                    src="/images/cancel_close_delete_exit_logout_remove_x_icon_123217.ico"
                                    alt=""></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <div id="paginacion" class="paginacion">
        <button onclick="cambiarPagina(-1)">
            << Anterior</button>
                <span id="pagina-actual">1</span>
                <button onclick="cambiarPagina(1)">Siguiente >></button>
    </div>

</div>

</div>

<div class="hidden" id="modal-add">

    <div class="modal-content">
       
    </div>

</div>


<div class="hidden" id="modal-edit">

    <div class="modal-content">
        <form id="formulario-producto" action="inventario.php" method="POST">
            <button type="button" id="close" class="send-form button">Cancelar</button>
            <div class="iventary-header inv-form">
                <h2>Actualizar producto</h2>
                <button type="submit" class="send-form button">Actualizar</button>
            </div>
            <?php include '../includes/templates/formularioProducto.php'; ?>

        </form>
    </div>

</div>

<div class="hidden" id="modal-delete">
    <div class="modal-content">
        <div class="logo-delet">
            <img src="../src/images/navbar-log.png" alt="">
        </div>
        <div class="delete-secure">
            <h4>Seguro quieres eliminar el producto??</h4>
        </div>
        <form>
            <div class="button-delete">
                <button class="button" type="submit" id="cerrar-delete"> Eliminar</button>
            </div>
        </form>
    </div>
</div>

</div>

</body>

<script>
    const filasPorPagina = 10;
    let paginaActual = 1;

    const tabla = document.querySelector(".tabla-productos tbody");
    const filas = Array.from(tabla.rows);
    const totalPaginas = Math.ceil(filas.length / filasPorPagina);
    const spanPagina = document.getElementById("pagina-actual");

    function mostrarPagina(pagina) {
        const inicio = (pagina - 1) * filasPorPagina;
        const fin = inicio + filasPorPagina;

        filas.forEach((fila, index) => {
            fila.style.display = index >= inicio && index < fin ? "" : "none";
        });

        spanPagina.textContent = paginaActual;
    }

    function cambiarPagina(direccion) {
        const nuevaPagina = paginaActual + direccion;

        if (nuevaPagina < 1 || nuevaPagina > totalPaginas) return;

        paginaActual = nuevaPagina;
        mostrarPagina(paginaActual);
    }
    mostrarPagina(paginaActual);
</script>

