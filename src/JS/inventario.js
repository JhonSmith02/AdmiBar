document.getElementById('openModal').addEventListener("click", () => {
    document.getElementById('modal-add').classList.remove('hidden')
})

document.getElementById('cerrar').addEventListener('click', () => {
    document.getElementById('modal-add').classList.add('hidden');
});

window.addEventListener('click', (e) => {
    if (e.target.id === 'modal-add') {
        document.getElementById('modal-add').classList.add('hidden');
    }
});


document.getElementById('formulario-producto').addEventListener('submit', async function(e) {
    e.preventDefault(); // Detenemos el impulso primitivo de recargar

    // Limpiamos errores previos (si los hay)
    document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));

    // Obtener valores
    const nombre = document.getElementById('nombre').value.trim();
    const marca = document.getElementById('marca').value.trim();
    const iva = document.getElementById('iva').value.trim();
    const precio = document.getElementById('precio').value.trim();
    const proveedor = document.getElementById('proveedor_id_proveedor').value;
    const categoria = document.getElementById('categoria_id_categoria').value;
    const observaciones = document.getElementById('observaciones').value.trim();

    let errores = [];

    const marcarError = (id) => document.getElementById(id).classList.add('input-error');

    // Validaciones
    if (nombre === "") { errores.push("El nombre del producto es obligatorio."); marcarError('nombre'); }
    if (marca === "") { errores.push("La marca del producto es obligatoria."); marcarError('marca'); }
    if (iva === "" || isNaN(iva) || Number(iva) < 0) { errores.push("El IVA debe ser un número positivo."); marcarError('iva'); }
    if (precio === "" || isNaN(precio) || Number(precio) <= 0) { errores.push("El precio debe ser un número mayor que cero."); marcarError('precio'); }
    if (proveedor === "alguien") { errores.push("Selecciona un proveedor válido."); marcarError('proveedor_id_proveedor'); }
    if (categoria === "non") { errores.push("Selecciona una categoría válida."); marcarError('categoria_id_categoria'); }

    if (errores.length > 0) {
        alert("Errores en el formulario:\n" + errores.join("\n"));
        return;
    }

    // Construir el objeto con los datos
    const datos = {
        nombre,
        marca,
        iva: parseFloat(iva),
        precio: parseFloat(precio),
        proveedor_id_proveedor: proveedor,
        categoria_id_categoria: categoria,
        observaciones
    };

    try {
        const respuesta = await fetch('guardarProducto.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datos)
        });

        if (!respuesta.ok) throw new Error("Error al enviar los datos");

        const resultado = await respuesta.json();

        if (resultado.success) {
            alert("Producto guardado exitosamente.");
            this.reset(); // Limpia el formulario
        } else {
            alert("Error al guardar el producto: " + (resultado.message || "sin detalles"));
        }
    } catch (error) {
        alert("Ocurrió un error técnico: " + error.message);
    }
});
