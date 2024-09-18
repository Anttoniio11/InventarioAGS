//---------------------------------------------------
// Elemento Tecnologico
//---------------------------------------------------
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('submitForm').addEventListener('click', function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        // Verifica si el formulario y sus campos están correctamente construidos
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

//---------------------------------------------------
// Elemento Fisico
//---------------------------------------------------

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('submitFormFisico').addEventListener('click', function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        let formData = new FormData(document.getElementById('dynamicFormFisico'));

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
                    throw new Error(error.mensaje || 'Error del servidor');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.mensaje) {
                alert(data.mensaje);
            } else {
                alert('Elemento Físico creado exitosamente');
                var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModalFisico'));
                myModal.hide();
                window.location.reload(); // Recargar la página si es necesario
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al guardar el elemento físico.');
        });
    });
});

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

//---------------------------------------------------
// Elemento Insumo
//---------------------------------------------------

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('submitFormInsumo').addEventListener('click', function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        let formData = new FormData(document.getElementById('dynamicFormInsumo'));

        fetch('/guardar-elemento-insumo', {
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
                alert('Elemento de Insumo creado exitosamente');
                var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModalInsumo'));
                myModal.hide();
                window.location.reload(); // Recargar la página si es necesario
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al guardar el elemento de insumo.');
        });
    });
});

