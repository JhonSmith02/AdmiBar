<div class="inventary-contain">
                <div class="iventary-header">
                    <h2>INVENTARIO</h2>

                    <?php if(intval($msg) === 1):?>
                        <span>Producto Creado Correctamente</span>
                        <?php elseif(intval($msg) === 2):?>
                            <span>Producto Actualizado</span>
                    <?php endif; ?>

                    <button id="openModal" class="button but-register">+ REGISTRAR </button>
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
                                                alt=""
                                            ></i></button>
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