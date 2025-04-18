document.addEventListener("DOMContentLoaded", () => {
    const botonRegistrar = document.querySelector('.button');

    botonRegistrar.addEventListener('click', () => {
        if (document.getElementById('modal-form')) return;

        const modal = document.createElement('div');
        modal.id = 'modal-form';
        modal.classList.add('modal-form');

        modal.innerHTML = `
            <div class="modal-content">
                <form action="../../../admin/productos/inventario.php" method="POST" id="formulario-producto">
        <button type="button" id="cerrar" class="send-form button">Cancelar</button>
        <div class="iventary-header inv-form">
            <h2>Registro de producto</h2>
            <button type="submit" class="send-form button">Crear</button>
        </div>

        <div class="columnas-crear">

            <div class="columna">
                <div class="form-group">
                    <label for="usuario">Nombre del producto</label>
                    <input 
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="Nombre producto"
                    
                    >
                </div>
        
                <div class="form-group">
                    <label for="marca">Marca del producto</label>
                    <input 
                    type="text"
                    id="marca"
                    name="marca"
                    placeholder="Marca del producto"
                    
                    >
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <input 
                    type="text"
                    id="proveedor_id_proveedor"
                    name="proveedor_id_proveedor"
                    placeholder="Proveeedor"
                    
                    >
                </div>
            </div>
            <div class="columna">
                <div class="form-group">
                    <label for="precio">Precio del Producto</label>
                    <input 
                    type="number"
                    id="precio"
                    name="precio"
                    placeholder="precio producto"
                    
                    >
                </div>
        
                <div class="form-group">
                    <label for="tipo">Categoria Producto</label>
                    <input 
                    type="text"
                    id="categoria_id_categoria"
                    name="categoria_id_categoria"
                    placeholder="Categoria Producto"
                    
                    >
                </div>
        
                <div class="form-group">
                    <label for="stock">Iva</label>
                    <input 
                    type="number"
                    id="iva"
                    name="iva"
                    placeholder="Impuesto Iva"
                    
                    >
                </div>
            </div>

        </div>

        <div class="form-group form-out">
            <label class="crear-observacion" for="observaciones">Observaciones</label>
            <input 
            type="text"
            id="observaciones"
            name="observaciones"
            >
        </div>
    </form>
        `;

        document.body.appendChild(modal);

        document.getElementById('cerrar').addEventListener('click', () => {
            modal.remove();
        });

        document.getElementById('formulario-producto').addEventListener('submit', e => {
            e.preventDefault();

            modal.remove();
        });
    });
});