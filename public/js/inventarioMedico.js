//---------------------------------------------------
// Elemento Medico
//---------------------------------------------------
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('submitFormMedico').addEventListener('click', function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        let formData = new FormData(document.getElementById('dynamicFormMedico'));

        fetch('/guardar-elemento-medico', {
            method: 'POST', // Asegúrate de usar POST
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
            if (data.mensaje) {
                alert(data.mensaje);
            } else {
                alert('Elemento Médico creado exitosamente');
                var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModalMedico'));
                myModal.hide();
                window.location.reload(); // Recargar la página si es necesario
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al guardar el elemento médico.');
        });
    });
});

function loadFormMedico() {
    fetch('/fields/elementos_medicos') // Ruta para obtener los campos dinámicos
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }

            const formHtml = data.map(field => `
                <div class="mb-3">
                    <label for="${field}" class="form-label">${field.charAt(0).toUpperCase() + field.slice(1)}</label>
                    <input type="text" class="form-control" name="${field}" id="${field}">
                </div>
            `).join('');

            document.getElementById('dynamicFormMedico').innerHTML = formHtml;

            var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModalMedico'));
            myModal.show();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            alert('Ocurrió un error al cargar los campos. Por favor, inténtelo de nuevo.');
        });
}
