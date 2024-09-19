

//---------------------------------------------------
// Ver Elemento Tecnologico
//---------------------------------------------------
function verElemento(id) {
    fetch(`/elemento/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }

            document.getElementById('element-id').textContent = data.id;
            document.getElementById('element-categoria').textContent = data.categoria ? data.categoria.categoria : 'No asignada';
            document.getElementById('element-codigo').textContent = data.codigo;
            document.getElementById('element-marca').textContent = data.marca;
            document.getElementById('element-referencia').textContent = data.referencia;
            document.getElementById('element-serial').textContent = data.serial;
            document.getElementById('element-ubicacion').textContent = data.ubicacion;
            document.getElementById('element-disponibilidad').textContent = data.disponibilidad ? data.disponibilidad : 'No especificada';
            document.getElementById('element-procesador').textContent = data.procesador || 'No especificado';
            document.getElementById('element-ram').textContent = data.ram || 'No especificado';
            document.getElementById('element-tipo-almacenamiento').textContent = data.tipo_almacenamiento || 'No especificado';
            document.getElementById('element-almacenamiento').textContent = data.almacenamiento || 'No especificado';
            document.getElementById('element-tarjeta-grafica').textContent = data.tarjeta_grafica || 'No especificado';
            document.getElementById('element-garantia').textContent = data.garantia || 'No especificado';

            var myModal = new bootstrap.Modal(document.getElementById('viewElementModal'));
            myModal.show();
        })
        .catch(error => {
            console.error('Ocurrió un error al cargar los detalles:', error);
            alert('Error al cargar los detalles. Inténtalo de nuevo.');
        });
}
