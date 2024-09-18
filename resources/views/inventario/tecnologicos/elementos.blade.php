@extends('plantilla')

@section('panelLateral')
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/inventarioTecnologico.js') }}"></script>
<link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">

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

                    <button onclick="loadFormTecnologico('elementos_tecnologicos')">Crear Elemento Tecnológico</button>

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
                                <td>
                                    <button onclick="verElemento({{ $elementosTecnologico->id }})" class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editarElemento({{ $elementosTecnologico->id }})" class="btn btn-link">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
                <div class="table-responsive">

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
                                <td>
                                    <button onclick="verCategoria({{ $categoriaTecnologico->id }})" class="btn btn-link">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editarCategoria({{ $categoriaTecnologico->id }})" class="btn btn-link">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal para ver Elemento Tecnologico --}}
    
    <div class="modal fade" id="viewElementModal" tabindex="-1" aria-labelledby="viewElementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewElementModalLabel">Detalles del Elemento Tecnológico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewElementDetails">
                    <!-- Los detalles del elemento se cargarán aquí -->
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>ID:</strong></td>
                                <td id="element-id"></td>
                            </tr>
                            <tr>
                                <td><strong>Categoría:</strong></td>
                                <td id="element-categoria"></td>
                            </tr>
                            <tr>
                                <td><strong>Código:</strong></td>
                                <td id="element-codigo"></td>
                            </tr>
                            <tr>
                                <td><strong>Marca:</strong></td>
                                <td id="element-marca"></td>
                            </tr>
                            <tr>
                                <td><strong>Referencia:</strong></td>
                                <td id="element-referencia"></td>
                            </tr>
                            <tr>
                                <td><strong>Serial:</strong></td>
                                <td id="element-serial"></td>
                            </tr>
                            <tr>
                                <td><strong>Ubicación:</strong></td>
                                <td id="element-ubicacion"></td>
                            </tr>
                            <tr>
                                <td><strong>Disponibilidad:</strong></td>
                                <td id="element-disponibilidad"></td>
                            </tr>
                            <tr>
                                <td><strong>Procesador:</strong></td>
                                <td id="element-procesador"></td>
                            </tr>
                            <tr>
                                <td><strong>RAM:</strong></td>
                                <td id="element-ram"></td>
                            </tr>
                            <tr>
                                <td><strong>Tipo de Almacenamiento:</strong></td>
                                <td id="element-tipo-almacenamiento"></td>
                            </tr>
                            <tr>
                                <td><strong>Almacenamiento:</strong></td>
                                <td id="element-almacenamiento"></td>
                            </tr>
                            <tr>
                                <td><strong>Tarjeta Gráfica:</strong></td>
                                <td id="element-tarjeta-grafica"></td>
                            </tr>
                            <tr>
                                <td><strong>Garantía:</strong></td>
                                <td id="element-garantia"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal para crear Elemento Tecnologico --}}
    
    <div class="modal fade" id="dynamicFormModal" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabel">Crear Elemento Tecnológico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicForm">
                        <!-- Los campos del formulario se generan aquí -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="submitForm">Guardar</button> <!-- Type "button" para evitar recarga -->
                </div>
            </div>
        </div>
    </div>

    {{-- Modal para crear Categoria Tecnologica --}}
    
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
    