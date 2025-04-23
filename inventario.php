<?php
require 'includes/app.php';

use App\Producto;

$db = new database();
$dbc = $db->getConexion();

$producto = new Producto();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    <link rel="stylesheet" href="build/css/app.css">
    <title>Inventario</title>
</head>


<body>
    <div class="con-inv">

        <nav class="navbar">
            <div class="nav-logo">
                <img src="./src/images/navbar-log.png" alt="nav_log">
            </div>

            <div class="nav-optioncontain">

                <div class="nav-option">
                    <ul>
                        <li> <a href="">INFORME</a> </li>
                        <li> <a href="">INVENTARIO</a> </li>
                        <li> <a href="">INFORME</a> </li>
                    </ul>
                </div>

                <div class="nav-salir">
                    <span>SALIR</span>
                </div>
            </div>

        </nav>

        <div class="cuerpo-inventario">

            <div class="lateral-opt">
                <div class="later-component">
                    <div class="lateral-icon">
                        <img src="./src/images/usuario.png" alt="User-icon">
                    </div>
                    <div class="laterl-information">
                        <div class="lateral-rol">
                            <span>ADMIN</span> <br>
                            <span class="user-name">Freddy Krueger</span>
                        </div>
                    </div>
                </div>

                <aside class="later-component">
                    <div class="lateral-icon">
                        <img src="./src/images/lector-tarj.png" alt="Lector-icon">
                    </div>
                    <div class="laterl-information">
                        <span>VENTA</span>
                    </div>
                </aside>

                <div class="later-component">
                    <div class="lateral-icon">
                        <img src="./src/images/usuario.png" alt="Lector-icon">
                    </div>
                    <div class="laterl-information">
                        <span>Proveedor</span>
                    </div>
                </div>
            </div>

            <div class="inventary-contain">
                <div class="iventary-header">
                    <h2>INVENTARIO</h2>

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

                        <?php foreach ($producto::all() as $row): ?>
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
                                <button  class="btn editar editar-prod"><i class="icon-pencil"><img
                                            src="./src/images/4213598-doodle-education-line-pen-pencil-school-science_115491.ico"
                                            alt=""></i></button>
                                <button class="btn eliminar delete-prod"><i class="icon-delete"><img
                                            src="./src/images/cancel_close_delete_exit_logout_remove_x_icon_123217.ico"
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

        <div class= "hidden" id ="modal-add">

            <div class="modal-content">
                <form id="formulario-producto">
                    <button type="button" id="cerrar" class="send-form button">Cancelar</button>
                    <div class="iventary-header inv-form">
                        <h2>Registro de producto</h2>
                        <button type="submit" class="send-form button">Crear</button>
                    </div>
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
                                <select type="text" id="proveedor_id_proveedor" name="proveedor_id_proveedor">
                                    <option value="alguien">Alguien</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="tipo">Categoria Producto</label>
                                <select type="text" id="categoria_id_categoria" name="categoria_id_categoria">
                                <option value="non">Alguien</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="form-group form-out">
                        <label class="crear-observacion" for="observaciones">Observaciones</label>
                        <input type="text" id="observaciones" name="observaciones">
                    </div>
                    </div>
                    
                </form>
            </div>

        </div>

        <div class= "hidden" id ="modal-edit">

            <div class="modal-content">
                <form id="formulario-producto">
                    <button type="button" id="close" class="send-form button">Cancelar</button>
                    <div class="iventary-header inv-form">
                        <h2>Registro de producto</h2>
                        <button type="submit" class="send-form button">Crear</button>
                    </div>
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
                                <select type="text" id="proveedor_id_proveedor" name="proveedor_id_proveedor">
                                    <option value="alguien">Alguien</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="tipo">Categoria Producto</label>
                                <select type="text" id="categoria_id_categoria" name="categoria_id_categoria">
                                <option value="non">Alguien</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="form-group form-out">
                        <label class="crear-observacion" for="observaciones">Observaciones</label>
                        <input type="text" id="observaciones" name="observaciones">
                    </div>
                    </div>
                    
                </form>
            </div>

        </div>

        <div class="hidden" id = "modal-delete">
            <div class="modal-content">
                <div class="logo-delet">
                    <img src="./src/images/navbar-log.png" alt="">
                </div>
                <div class="delete-secure">
                        <h4>Seguro quieres eliminar el producto??</h4>
                    </div>
                <form >
                    <div class="button-delete">
                        <button class="button"type = "submit" id= "cerrar-delete"> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>

        </section>

        
</body>

<script src="./src/JS/inventario.js"></script>

<script>
    const filasPorPagina = 5;
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


</html>