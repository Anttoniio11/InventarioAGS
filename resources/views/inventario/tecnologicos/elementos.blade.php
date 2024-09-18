@extends('plantilla')

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('panelLateral')
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/inventario.js') }}"></script>


    <div class="content">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="elementos-tab" data-bs-toggle="tab" href="#elementos" role="tab" aria-controls="elementos" aria-selected="true">Elementos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="categorias-tab" data-bs-toggle="tab" href="#categorias" role="tab" aria-controls="categorias" aria-selected="false">Categorías</a>
            </li>
        </ul>
        
        <div class="tab-content mt-3" id="myTabContent">

            <div class="tab-pane fade show active" id="elementos" role="tabpanel" aria-labelledby="elementos-tab">
                <div class="table-responsive">

                    <button type="button" class="btn btn-submit" onclick="loadFormTecnologico('elementos_tecnologicos')">Crear Elemento Tecnológico</button>

                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Elemento</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Serial</th>
                                <th scope="col">Ubicacion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($elementosTecnologicos as $elementosTecnologico)
                            <tr>
                                <td>{{$elementosTecnologico->id}}</td>
                                <td>{{$elementosTecnologico->categoria}}</td>
                                <td>{{$elementosTecnologico->codigo}}</td>
                                <td>{{$elementosTecnologico->marca}}</td>
                                <td>{{$elementosTecnologico->referencia}}</td>
                                <td>{{$elementosTecnologico->serial}}</td>
                                <td>{{$elementosTecnologico->ubicacion}}</td>
                                <td></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
                <div class="table-responsive">

                    {{-- <button onclick="loadFormCategoria('categorias_tecnologicos')">Crear Categoria Tecnológico</button> --}}
                    <button onclick="loadFormCategoria()">Crear Categoría Tecnológica</button>

                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Categoría</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoriasTecnologicos as $categoriaTecnologico)
                            <tr>
                                <td>{{$categoriaTecnologico->id}}</td>
                                <td>{{$categoriaTecnologico->categoria}}</td>
                                <td>{{$categoriaTecnologico->descripcion}}</td>
                                <td>   </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dynamicFormModal" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabel">Crear Elemento Tecnológico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicForm"> 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="submitForm">Guardar</button> <!-- Type "button" para evitar recarga -->
                </div>
            </div>
        </div>
    </div>
    
    
    <script>

        
function loadFormTecnologico(tableName) {
    fetch(`/fields/${tableName}`)
        .then(response => response.json())
        .then(data => {
            const formHtml = data.reduce((html, field, index) => {
                if (index % 2 === 0) {
                    html += '<div class="row mb-3">';
                }

                const fieldName = field.name;
                const fieldType = field.type;

                let inputHtml = '';

                switch (fieldType) {
                    case 'date':
                        inputHtml = `
                            <label for="${fieldName}" class="form-label">${fieldName.charAt(0).toUpperCase() + fieldName.slice(1)}</label>
                            <input type="date" class="form-control" name="${fieldName}" id="${fieldName}">
                        `;
                        break;
                    case 'unsignedBigInteger':
                        inputHtml = `
                            <label for="${fieldName}" class="form-label">${fieldName.charAt(0).toUpperCase() + fieldName.slice(1)}</label>
                             <select class="form-control" name="${fieldName}" id="${fieldName}">
                                <!-- Opciones se agregarán aquí con JavaScript -->
                            </select>
                        `;
                        break;
                    case 'set':
                        inputHtml = `
                            <label for="${fieldName}" class="form-label">${fieldName.charAt(0).toUpperCase() + fieldName.slice(1)}</label>
                            <select class="form-control" name="${fieldName}" id="${fieldName}">
                                <!-- Opciones se agregarán aquí con JavaScript -->
                            </select>
                        `;
                        break;
                    default:
                        inputHtml = `
                            <label for="${fieldName}" class="form-label">${fieldName.charAt(0).toUpperCase() + fieldName.slice(1)}</label>
                            <input type="text" class="form-control" name="${fieldName}" id="${fieldName}">
                        `;
                        break;
                }

                html += `
                    <div class="col-md-6">
                        ${inputHtml}
                    </div>
                `;

                if (index % 2 === 1 || index === data.length - 1) {
                    html += '</div>';
                }

                return html;
            }, '');

            document.getElementById('dynamicForm').innerHTML = formHtml;

            // Manejar los campos tipo 'set' para agregar opciones
            data.forEach(field => {
                if (field.type === 'set') {
                    const selectElement = document.getElementById(field.name);
                    // Extraer las opciones del 'set' y agregarlas al select
                    const options = field.values || []; // Asumiendo que `field.values` contiene las opciones
                    options.forEach(option => {
                        const optionElement = document.createElement('option');
                        optionElement.value = option;
                        optionElement.textContent = option;
                        selectElement.appendChild(optionElement);
                    });
                }
            });

            var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModal'));
            myModal.show();
        })
        .catch(error => {
            console.error('Ocurrió un error al cargar los campos:', error);
            alert('Error al cargar los campos. Inténtalo de nuevo.');
        });
}

    </script>


    <div class="modal fade" id="dynamicFormModalCategoria" tabindex="-1" aria-labelledby="dynamicFormModalLabelCategoria" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabelCategoria">Crear Categoría Tecnológico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicFormCategoria">
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input type="text" class="form-control" name="categoria" id="categoria">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="submitFormCategoria">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadFormCategoria() {
            fetch('/fields/categorias_tecnologicos') // Ruta para obtener los campos dinámicos para categorías
                .then(response => response.json())
                .then(data => {
                    const formHtml = data.map(field => `
                        <div class="mb-3">
                            <label for="${field}" class="form-label">${field.charAt(0).toUpperCase() + field.slice(1)}</label>
                            <input type="text" class="form-control" name="${field}" id="${field}">
                        </div>
                    `).join('');
    
                    document.getElementById('dynamicFormCategoria').innerHTML = formHtml;
    
                    var myModal = new bootstrap.Modal(document.getElementById('dynamicFormModalCategoria'));
                    myModal.show();
                })
                .catch(error => {
                    console.error('Ocurrió un error al cargar los campos:', error);
                    alert('Error al cargar los campos. Inténtalo de nuevo.');
                });
        }
    </script>