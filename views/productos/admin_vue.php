<div id="app">
  <h2>PRODUCTOS (via Vue + API)</h2>

  <table class="tabla-productos">
    <thead>
      <tr>
        <th># ID</th><th>NOMBRE</th><th>MARCA</th><th>PRECIO</th>
        <th>IVA</th><th>DESCRIPCION</th><th>CATEGORIA</th><th>PROVEEDOR</th><th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="p in productos" :key="p.id_producto">
        <td>{{ p.id_producto }}</td>
        <td>{{ p.nombre }}</td>
        <td>{{ p.marca }}</td>
        <td>{{ p.precio }}</td>
        <td>{{ p.iva }}</td>
        <td>{{ p.descripcion }}</td>
        <td>{{ p.nombre_categoria }}</td>
        <td>{{ p.proveedor_nombre }} {{ p.proveedor_apellido }}</td>
        <td>
          <a :href="`/productos/update?id=${p.id_producto}`" class="btn editar">✏️</a>
          <form :action="`/productos/delete`" method="POST" style="display:inline">
            <input type="hidden" name="id_producto" :value="p.id_producto">
            <button type="submit" class="btn eliminar" @click.prevent="confirmarEliminar(p.id_producto)">🗑️</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<script>
  const { createApp } = Vue;

  createApp({
    data() {
      return {
        productos: []
      }
    },
    methods: {
      async fetchProductos() {
        try {
          const res = await fetch('/api/productos');
          if (!res.ok) throw new Error('Fetch failed');
          this.productos = await res.json();
        } catch (e) {
          console.error(e);
        }
      },
      confirmarEliminar(id) {
        if (confirm('¿Seguro que quieres eliminar este producto?')) {
          // envía el form manualmente
          const form = event.target.closest('form');
          form.submit();
        }
      }
    },
    mounted() {
      this.fetchProductos();
    }
  }).mount('#app');
</script>
