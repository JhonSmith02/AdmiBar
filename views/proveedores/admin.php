<div class="inventary-contain">
      <?php $msg = $_GET['msg'] ?? null; ?>
    <?php if (intval($msg) === 2): ?>
        <div class="msg exito">
            <span class="mensaje-texto">Proveedor Actualizado</span>
        </div>
        <?php elseif (intval($msg) === 3): ?>
        <div class="msg error">
            <span class="mensaje-texto">Producto Eliminado</span>
        </div>
    <?php endif; ?>
    <div class="iventary-header">
        <h2>PROVEEDORES</h2>
        <a href="/proveedores/create" id="openModal" class="button but-register">+ REGISTRAR </a>
    </div>

    <div class="search-inv">
        <div class="buscador">
            <span class="material-symbols-outlined">
                search
            </span>
            <input type="text" placeholder=" Buscar Proveedor" class="serch-inventory">
        </div>

    </div>

    <table class="tabla-productos">
        <thead>
            <tr>
                <th>#ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($proveedores as $row): ?>
                <tr>
                    <td>
                        <?php echo $row->id_proveedor; ?>
                    </td>
                    <td>
                        <?php echo $row->nombre; ?>
                    </td>
                    <td>
                        <?php echo $row->apellido; ?>
                    </td>
                    <td>
                        <?php echo $row->telefono; ?>
                    </td>
                    <td>
                        <?php echo $row->correo; ?>
                    </td>
                    <td>
                        <?php echo $row->descripcion; ?>
                    </td>
                    <td>
                        <div class="acciones-inv">
                            <a href="/proveedores/update?id=<?php echo $row->id_proveedor; ?>" class="btn editar editar-prod"><i class="icon-pencil"><img
                                src="/images/edit.png"
                                alt=""></i>
                            </a>

                            <form action="/proveedores/delete" method="POST">
                                <input type="hidden" name="id_proveedor" value="<?php echo $row->id_proveedor; ?>">
                                <button type="submit" class="btn eliminar delete-prod" value="Delete">
                                    <i class="icon-delete"><img src="/images/cancel_close_delete_exit_logout_remove_x_icon_123217.ico" alt=""></i>
                                </button>
                            </form>
                        </div>
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

