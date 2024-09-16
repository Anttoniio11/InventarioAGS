

$('#btnGuardarElemento').on('click', function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');


    const data = {
        'codigo': $('#codigo').val(),
        'marca': $('#marca').val(),
        'referencia': $('#referencia').val(),
        'serial': $('#serial').val(),
        'ubicacion': $('#ubicacion').val(),
        'disponibilidad': $('#disponibilidad').val(),
        'codigo_QR': $('#codigo_QR').val(),
        'procesador': $('#procesador').val(),
        'ram': $('#ram').val(),
        'tipo_almacenamiento': $('#tipo_almacenamiento').val(),
        'almacenamiento': $('#almacenamiento').val(),
        'tarjeta_grafica': $('#tarjeta_grafica').val(),
        'garantia': $('#garantia').val(),
        'id_empleado': $('#id_empleado').val(),
        'id_area': $('#id_area').val(),
        'id_sede': $('#id_sede').val(),
        'id_factura': $('#id_factura').val(),
        'id_categoria': $('#id_categoria').val(),
        'id_estado': $('#id_estado').val(),
    };

    console.log(data);

    const datos = JSON.stringify(data);

    $.ajax({
        type: 'POST',
        url: urlBase + '/guardarElementoTecnologico',
        data: {
            datos: datos,
            _token: csrfToken,
        },
        success: function (response) {

            alertSwitch('success', 'Elemento guardado exitosamente.');

            $('#dynamicForm')[0].reset();
        },
        error: function (xhr, status, error) {
            if (xhr.status === 422) {
                alertSwitch('error', xhr.responseJSON.mensaje);
            }
        }
    });
});


function loadForm(tableName) {
    fetch(`/fields/${tableName}`)
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

            document.getElementById('dynamicForm').innerHTML = formHtml;

            document.getElementById('btnGuardarElemento').onclick = function() {
                document.getElementById('dynamicForm').action = `/save-${tableName}`;
                document.getElementById('dynamicForm').submit();
            };

            var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModal'));
            myModal.show();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            alert('Ocurrió un error al cargar los campos. Por favor, inténtelo de nuevo.');
        });
}