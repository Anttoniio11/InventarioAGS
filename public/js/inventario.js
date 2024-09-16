// -----------------------------------------------------------------------------
// Elemento Fisico
// -----------------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('submitForm').addEventListener('click', function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        let formData = new FormData(document.getElementById('dynamicForm'));

        fetch('/guardar-elemento-fisico', {
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
                    throw new Error(error.message || 'Server error');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.mensaje) {
                alert(data.mensaje);
            } else {
                alert('Elemento creado exitosamente');
                var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModal'));
                myModal.hide();
                window.location.reload(); // Recargar la página
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al guardar el elemento.');
        });
    });
});

