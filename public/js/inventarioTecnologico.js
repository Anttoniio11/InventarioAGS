// ---------------------------------------------------
// Crear Nuevo Elemento Tecnologico
// ---------------------------------------------------
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('submitForm').addEventListener('click', function(event) {
        event.preventDefault();

        let formData = new FormData(document.getElementById('dynamicForm'));

        fetch('/guardar-elemento-tecnologico', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(error => {
                    throw new Error(error.mensaje || 'Error del servidor');
                });
            }
            return response.json();
        })
        .then(data => {
            alert(data.mensaje);
            var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModal'));
            myModal.hide();
            window.location.reload(); // Recargar la página tras éxito
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al guardar el elemento.');
        });
    });
});

function loadFormTecnologico(tableName) {
    fetch(`/fields/${tableName}`)
        .then(response => response.json())
        .then(data => {
            const formHtml = data.map(field => `
                <div class="mb-3">
                    <label for="${field}" class="form-label">${field.charAt(0).toUpperCase() + field.slice(1)}</label>
                    <input type="text" class="form-control" name="${field}" id="${field}">
                </div>
            `).join('');

            document.getElementById('dynamicForm').innerHTML = formHtml;
            var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModal'));
            myModal.show();
        })
        .catch(error => {
            console.error('Ocurrió un error al cargar los campos:', error);
            alert('Error al cargar los campos. Inténtalo de nuevo.');
        });
}

//---------------------------------------------------
// Crear Nueva Categoria Tecnologica
//---------------------------------------------------

// document.addEventListener('DOMContentLoaded', () => {
//     document.getElementById('submitFormCategoria').addEventListener('click', function(event) {
//         event.preventDefault(); // Evitar el envío normal del formulario

//         let formData = new FormData(document.getElementById('dynamicFormCategoria'));

//         fetch('/guardar-categoria-tecnologico', {
//             method: 'POST',
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//                 'Accept': 'application/json'
//             },
//             body: formData
//         })
//         .then(response => {
//             if (!response.ok) {
//                 return response.json().then(error => {
//                     throw new Error(error.mensaje || 'Error del servidor');
//                 });
//             }
//             return response.json();
//         })
//         .then(data => {
//             if (data.mensaje) {
//                 alert(data.mensaje);
//             } else {
//                 alert('Categoría tecnológica creada exitosamente');
//                 var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModalCategoria'));
//                 myModal.hide();
//                 window.location.reload(); // Recargar la página si es necesario
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             alert('Ocurrió un error al guardar la categoría tecnológica.');
//         });
//     });
// });

// function loadFormCategoria() {
//     fetch('/fields/categorias_tecnologicos') // Ruta para obtener los campos dinámicos para categorías
//         .then(response => response.json())
//         .then(data => {
//             const formHtml = data.map(field => `
//                 <div class="mb-3">
//                     <label for="${field}" class="form-label">${field.charAt(0).toUpperCase() + field.slice(1)}</label>
//                     <input type="text" class="form-control" name="${field}" id="${field}">
//                 </div>
//             `).join('');

//             document.getElementById('dynamicFormCategoria').innerHTML = formHtml;

//             var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModalCategoria'));
//             myModal.show();
//         })
//         .catch(error => {
//             console.error('Ocurrió un error al cargar los campos:', error);
//             alert('Error al cargar los campos. Inténtalo de nuevo.');
//         });
// }


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
