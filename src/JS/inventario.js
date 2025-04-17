document.addEventListener("DOMContentLoaded", () => {
    const botonRegistrar = document.querySelector('.button');

    botonRegistrar.addEventListener('click', () => {
        if (document.getElementById('modal-form')) return;

        const modal = document.createElement('div');
        modal.id = 'modal-form';
        modal.classList.add('modal-form');

        modal.innerHTML = `
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
                    <input 
                    type="text"
                    id="nombre-prod"
                    name="nombre-prod"
                    placeholder="Nombre producto"
                    required
                    >
                </div>
        
                <div class="form-group">
                    <label for="marca">Marca del producto</label>
                    <input 
                    type="text"
                    id="marca-producto"
                    name="marca-producto"
                    placeholder="Marca del producto"
                    required
                    >
                </div>
                <div class="form-group">
                    <label for="proovedor">Proovedor</label>
                    <input 
                    type="text"
                    id="nombre-proovedor"
                    name="nombre-proovedor"
                    placeholder="Proovedor"
                    required
                    >
                </div>
            </div>
            <div class="columna">
                <div class="form-group">
                    <label for="precio">Precio del Producto</label>
                    <input 
                    type="text"
                    id="precio-prod"
                    name="precio-prod"
                    placeholder="precio producto"
                    required
                    >
                </div>
        
                <div class="form-group">
                    <label for="tipo">tipo del producto</label>
                    <input 
                    type="text"
                    id="tipo-prod"
                    name="tipo-prod"
                    placeholder="Tipo producto"
                    required
                    >
                </div>
        
                <div class="form-group">
                    <label for="stock">Cantidad del producto</label>
                    <input 
                    type="text"
                    id="stock-prod"
                    name="stock-prod"
                    placeholder="Cantidad producto"
                    required
                    >
                </div>
            </div>

        </div>
        
        <div class="form-group form-out">
            <label for="noc">El que me dijo que pusiera pero no recuerdo</label>
            <input 
            type="text"
            id="noc"
            name="noc"
            placeholder="El que falta"
            required
            >
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

            alert('Producto registrado (supongo :D)');
            modal.remove();
        });
    });
});