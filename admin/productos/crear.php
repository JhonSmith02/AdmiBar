<?php

require '../../includes/app.php';

use App\Producto;

//Conexion a la base de datos
$db = new database();
$dbc = $db->getConexion();

$queryCategoria = "SELECT * FROM categoria";
$stmt = $dbc->prepare($queryCategoria);
$stmt->execute();
$categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);

$producto = new Producto();






//Validacion ara verificar el metodo de envio de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $producto = new Producto($_POST);

    $errors = $producto->validate();

    // debuguear($producto::getErrors());

    $producto->save();

    // $producto::all();


    // debuguear($producto);
}

?>


<main>
    <h1>Crear Productos</h1>

    <a href="../index.php">volver</a>

    <form action="crear.php" method="POST" style="display: flex; flex-direction: column; width: 200px;">

        <label for=" ">Nombre</label>
        <input type="text" name="nombre">

        <label for=" ">marca</label>
        <input type="text" name="marca">

        <label for=" ">precio</label>
        <input type="number" name="precio">

        <label for=" ">iva</label>
        <input type="number" name="iva">

        <label for=" ">descripcion</label>
        <input type="text" name="descripcion">

        <label for=" ">Categoria</label>
        <select name="categoria_id_categoria" id="">
            <option value="" disabled selected>Selecciona</option>
            <?php foreach ($categoria as $row): ?>
                <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for=" ">Proveedor</label>
        <select name="proveedor_id_proveedor" id="">
            <option value="" disabled selected>Selecciona</option>
            <option value="002">JhonSmith</option>
                
        </select>

        <button type="submit">Enviar</button>

    </form>


    <table>
        <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>MARCA</th>
                    <th>PRECIO</th>
                    <th>IVA</th>
                    <th>DESCRIPCION</th>
                    <th>CATEGORIA</th>
                    <th>PROVEEDOR</th>
                </tr>
        </thead>

        <tbody>
                <?php foreach($producto::all() as $row): ?>
                    <tr>
                    <td><?php  echo $row->id_producto;?></td>
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo $row->marca; ?></td>
                    <td><?php echo $row->precio; ?></td>
                    <td><?php echo $row->iva; ?></td>
                    <td><?php echo $row->descripcion; ?></td>
                    <td><?php echo $row->categoria_id_categoria;?></td>
                    <td><?php echo $row->proveedor_id_proveedor;?></td>
                    </tr> 
                <?php endforeach; ?> 
        </tbody>
    </table>

</main>