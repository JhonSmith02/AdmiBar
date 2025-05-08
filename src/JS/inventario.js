function configurarModal({ triggerId, modalId, closeBtnId }) {
    const trigger = document.getElementById(triggerId);
    const modal = document.getElementById(modalId);
    const closeBtn = document.getElementById(closeBtnId);

    if (!trigger || !modal || !closeBtn) {
        console.warn(`Algunos elementos no existen para el modal: ${modalId}`);
        return;
    }

    trigger.addEventListener("click", () => {
        modal.classList.remove('hidden');
    });

    closeBtn.addEventListener("click", () => {
        modal.classList.add('hidden');
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
}

configurarModal({
    triggerId: 'openModal',
    modalId: 'modal-add',
    closeBtnId: 'cerrar'
});

document.addEventListener('DOMContentLoaded', () => {
    const abrirModal = (selector, callback) => {
        document.querySelectorAll(selector).forEach(boton => {
            boton.addEventListener('click', function () {
                const fila = this.closest('tr');
                const id = fila?.querySelector('td')?.textContent.trim();
                console.log(`${selector} ID:`, id);
                const modalId = selector === '.editar-prod' ? 'modal-edit' : 'modal-delete';
                document.getElementById(modalId)?.classList.remove('hidden');
                callback?.(id);
            });
        });
    };

    const cerrarModal = (modalId, botonCierreId = null) => {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        modal.addEventListener('click', e => {
            if (e.target === modal) modal.classList.add('hidden');
        });

        if (botonCierreId) {
            const btn = document.getElementById(botonCierreId);
            if (btn) {
                btn.addEventListener('click', () => modal.classList.add('hidden'));
            }
        }
    };

    abrirModal('.editar-prod');
    abrirModal('.delete-prod');

    cerrarModal('modal-edit', 'close');
    cerrarModal('modal-delete');
});
