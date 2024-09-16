@extends('plantilla')
@section('panelLateral')
@endsection

    <link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">

    <div class="content">

        <!-- Pestañas Elementos y Categorias-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="elementos-tab" data-bs-toggle="tab" href="#elementos" role="tab" aria-controls="elementos" aria-selected="true">Elementos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="categorias-tab" data-bs-toggle="tab" href="#categorias" role="tab" aria-controls="categorias" aria-selected="false">Categorías</a>
            </li>
        </ul>
        
        <div class="tab-content mt-3" id="myTabContent">

            <!-- Pestaña de Elementos -->
            <div class="tab-pane fade show active" id="elementos" role="tabpanel" aria-labelledby="elementos-tab">
                <button onclick="loadForm('elementos_insumos')">Crear Elemento Medico</button>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Elemento</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Registro sanitario</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Fecha de vencimiento</th>
                                <th scope="col">Indicaciones</th>
                                <th scope="col">Observacion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($elementosInsumos as $elementosInsumo)
                            <tr>
                                <td>{{$elementosInsumo->id}}</td>
                                <td>{{$elementosInsumo->categoria}}</td>
                                <td>{{$elementosInsumo->registro_sanitario}}</td>
                                <td>{{$elementosInsumo->marca}}</td>
                                <td>{{$elementosInsumo->fecha_vencimiento}}</td>
                                <td>{{$elementosInsumo->indicaciones}}</td>
                                <td>{{$elementosInsumo->observacion}}</td>
                                <td>   </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pestaña de Categorías -->
            <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
                <div class="table-responsive">

                    <button onclick="loadForm('categorias_insumos')">Crear Categoria Tecnológico</button>

                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Categoría</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @foreach ($categoriasInsumos as $categoriaInsumo)
                                <tr>
                                    <td>{{$categoriaInsumo->id}}</td>
                                    <td>{{$categoriaInsumo->codigo}}</td>
                                    <td>{{$categoriaInsumo->categoria}}</td>
                                    <td>   </td>
                                </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dynamicFormModal" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabel">Formulario Dinámico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicForm">
                        <!-- Los campos del formulario se generarán aquí -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="submitForm">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script>
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
    
                    document.getElementById('submitForm').onclick = function() {
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
    </script>
    