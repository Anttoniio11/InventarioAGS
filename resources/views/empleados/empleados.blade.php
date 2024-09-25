@extends('plantilla')
@section('panelLateral')
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">

<div class="content">

    <!-- Pestañas Empleados-->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="empleados-tab" data-bs-toggle="tab" href="#empleados" role="tab" aria-controls="empleados" aria-selected="true">Empleados</a>
        </li>
    </ul>

    <div class="tab-content mt-3" id="myTabContent">

        <div class="tab-pane fade show active" id="empleados" role="tabpanel" aria-labelledby="empleados-tab">
            <div class="table-responsive">

                <div class="d-flex align-items-center mb-3">
                    <div class="input-group me-2" style="max-width: 300px;">
                        <input type="text" class="form-control" id="search" placeholder="Buscar..." aria-label="Buscar..." style="height: calc(2rem + 2px);">
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                
                    <div class="input-group me-2" style="max-width: 300px;">
                        <select class="form-select" id="filterSede" aria-label="Filtrar por sede" style="height: calc(2rem + 2px);">
                            <option value="">Seleccionar sede...</option>
                            <option value="BUENOS AIRES">BUENOS AIRES</option>
                            <option value="BALBOA">BALBOA</option>
                            <option value="MERCADERES">MERCADERES</option>
                            <option value="PATIA">PATIA</option>
                            <option value="POPAYAN">POPAYAN</option>
                        </select>
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                
                    <div class="ms-auto">
                        <button type="button" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#modalEmpleado">
                            Crear Nuevo Empleado
                        </button>
                    </div>
                </div>


                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Area</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre1 }} {{ $empleado->nombre2 }}</td>
                            <td>{{ $empleado->apellido1 }} {{ $empleado->apellido2 }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->sede }}</td>
                            <td>{{ $empleado->area }}</td>
                            <td>
                                <button
                                    onclick="window.open('{{ route('empleadoActa.ver', $empleado->id) }}', '_blank')"
                                    class="btn btn-link" title="Acta de Entrega">
                                    <i class="fas fa-file-alt icon-color"></i>
                                </button>
                                <button type="button" class="btn btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editModal" data-id="{{ $empleado->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                </nav>

            </div>
        </div>

    {{-- Modal para crear Empleado --}}

    <x-modal modalId="modalEmpleado" title="Crear Empleado" action="{{ route('guardar.empleado') }}" buttonText="Guardar">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre1" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="nombre1" name="nombre1" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre2" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="nombre2" name="nombre2" nullable>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido1" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido2" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2" nullable>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="identificacion" class="form-label">Identificacion</label>
                    <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option value="">Seleccione el sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" nullable>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" required>
                </div>

                <div class="col-md-3 mb-4">
                    <label for="id_sede" class="form-label">Sede</label>
                    <select class="form-select" id="id_sede" name="id_sede">
                        <option value="">Seleccione una sede</option>
                        @foreach ($sedes as $sede)
                            <option value="{{ $sede->id }}">{{ $sede->municipio }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label for="id_area" class="form-label">Area</label>
                    <select class="form-select" id="id_area" name="id_area">
                        <option value="">Seleccione un area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label for="id_rol" class="form-label">Rol</label>
                    <select class="form-select" id="id_rol" name="id_rol">
                        <option value="">Seleccione un area</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
    </x-modal>

    {{-- Modal para editar Empleado --}}

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-center w-100" id="editModalLabel">Editar Empleado</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="elementId">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre1" class="form-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="nombre1" name="nombre1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nombre2" class="form-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="nombre2" name="nombre2">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido1" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="apellido1" name="apellido1" required>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="apellido2" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="identificacion" class="form-label">Identificación</label>
                            <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" id="sexo" name="sexo" required>
                                <option value="">Seleccione el sexo</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="id_sede" class="form-label">Sede</label>
                            <select class="form-select" id="id_sede" name="id_sede">
                                <option value="">Seleccione una sede</option>
                                @foreach ($sedes as $sede)
                                    <option value="{{ $sede->id }}">{{ $sede->municipio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="id_area" class="form-label">Área</label>
                            <select class="form-select" id="id_area" name="id_area">
                                <option value="">Seleccione un área</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="id_rol" class="form-label">Rol</label>
                            <select class="form-select" id="id_rol" name="id_rol">
                                <option value="">Seleccione un rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>


    {{-- Buscador y filtro --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const filterSede = document.getElementById('filterSede');
            const tableRows = document.querySelectorAll('table tbody tr');

            // Función para filtrar las filas
            function filterRows() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedSede = filterSede.value;

                tableRows.forEach(row => {
                    const cells = row.getElementsByTagName('td');
                    let rowContainsSearchTerm = false;
                    let matchesSede = true;

                    // Verificar el término de búsqueda
                    for (let i = 0; i < cells.length; i++) {
                        if (cells[i].innerText.toLowerCase().includes(searchTerm)) {
                            rowContainsSearchTerm = true;
                            break;
                        }
                    }

                    // Filtrar por sede
                    if (selectedSede) {
                        matchesSede = cells[4].innerText === selectedSede;
                    }

                    // Mostrar fila si coincide con todos los filtros
                    if (rowContainsSearchTerm && matchesSede) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Eventos para manejar la búsqueda y el filtro
            searchInput.addEventListener('input', filterRows);
            filterSede.addEventListener('change', filterRows);
        });
    </script>

    {{-- Actualizar Empleado --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.btn-edit');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const modalId = this.getAttribute('data-bs-target');

                    fetch(`/empleado/editar/${id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Elemento no encontrado');
                            }
                            return response.json();
                        })
                        .then(data => {
                            const modal = document.querySelector(modalId);
                            modal.querySelector('#elementId').value = data.id;
                            modal.querySelector('#nombre1').value = data.nombre1;
                            modal.querySelector('#nombre2').value = data.nombre2 || '';
                            modal.querySelector('#apellido1').value = data.apellido1;
                            modal.querySelector('#apellido2').value = data.apellido2 || '';
                            modal.querySelector('#identificacion').value = data.identificacion;
                            modal.querySelector('#fecha_nacimiento').value = data.fecha_nacimiento;
                            modal.querySelector('#sexo').value = data.sexo;
                            modal.querySelector('#direccion').value = data.direccion || '';
                            modal.querySelector('#email').value = data.email || '';
                            modal.querySelector('#celular').value = data.celular || '';
                            modal.querySelector('#id_area').value = data.id_area || '';
                            modal.querySelector('#id_sede').value = data.id_sede || '';
                            modal.querySelector('#id_rol').value = data.id_rol || '';

                            const editForm = modal.querySelector('form');
                            const newFormSubmitHandler = (event) => {
                                event.preventDefault();

                                const formData = new FormData(editForm);

                                fetch(`/empleado/actualizar/${id}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: formData
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Error al actualizar');
                                    }
                                    return response.json();
                                })
                                .then(result => {
                                    if (result.success) {
                                        const bootstrapModal = bootstrap.Modal.getInstance(modal);
                                        bootstrapModal.hide();

                                        const row = document.querySelector(`#row-${id}`);
                                        row.querySelector('.nombre').textContent = formData.get('nombre1') + ' ' + formData.get('nombre2');
                                        row.querySelector('.apellido').textContent = formData.get('apellido1') + ' ' + formData.get('apellido2');
                                        row.querySelector('.email').textContent = formData.get('email');
                                        row.querySelector('.id_sede').textContent = formData.get('id_sede');
                                        row.querySelector('.id_area').textContent = formData.get('id_area');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                            };

                            editForm.removeEventListener('submit', editForm._submitHandler || (() => {}));
                            editForm._submitHandler = newFormSubmitHandler; 
                            editForm.addEventListener('submit', newFormSubmitHandler);
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
    