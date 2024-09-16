
$('#btnGuardarContrato').on('click', function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    campoVacio = validarCampos();
    if (campoVacio) {
        alertSwitch("error", "Debes llenar el campo: " + campoVacio);
        return;
    }

    const data = {
        'entidadSalud': $('#entidadSalud').val(),
        'nit_contratante': $('#nit_contratante').val(),
        'razon_social_contratante': $('#razon_social_contratante').val(),
        'codigo_habilitacion_sede': $('#codigo_habilitacion_sede').val(),
        'nit_contratista': $('#nit_contratista').val(),
        'razon_social_contratista': $('#razon_social_contratista').val(),
        'modalidad_pago': $('#modalidad_pago').val(),
        'numero_contrato': $('#numero_contrato').val(),
        'tipo_contrato': $('#tipo_contrato').val(),
        'tipo_contratacion': $('#tipo_contratacion').val(),
        'fecha_inicio': $('#fecha_inicio').val(),
        'fecha_fin': $('#fecha_fin').val(),
        'prorroga': $('#prorroga').val(),
        'estado_contrato': $('#estado_contrato').val(),
    };

    const datos = JSON.stringify(data);

    $.ajax({
        type: 'POST',
        url: urlBase + '/guardarContratos',
        data: {
            datos: datos,
            _token: csrfToken,
        },
        success: function (response) {

            $('#idConvenioContrato').val(response);
            alertSwitch('success', 'Contrato Creado con Éxito');

            if ($('#modalidad_pago').val() == 'Pago Global prospectivo') {
                var idContrato = response;
                $.ajax({
                    type: 'GET',
                    url: urlBase + '/getValorMesContrato',
                    data: {
                        idContrato: idContrato
                    },
                    success: function (cantidadRegistros) {
                        if (cantidadRegistros == 0) {
                            setTimeout(function () {
                                Swal.fire({
                                    title: 'Debes asignar un valor por mes al contrato',
                                    icon: 'warning',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Asignar valor por mes',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        manejarClickVerValorMes();
                                        $('#verValorMesC').modal('show');
                                    }
                                });
                            }, 800);
                        }

                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }

        },
        error: function (xhr, status, error) {
            if (xhr.status === 422) {
                alertSwitch('error', xhr.responseJSON.mensaje);
            }
        }
    });
});
