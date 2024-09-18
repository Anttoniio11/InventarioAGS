@extends('plantilla')
@section('panelLateral')
@endsection 

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/inventarioInsumo.js') }}"></script>
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
                <div class="table-responsive">

                <button onclick="loadFormInsumo('elementos_insumos')">Crear Elemento Insumo</button>

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
                                <td>
                                    <button onclick="viewElement({{ $elementosInsumo->id }})" class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editElement({{ $elementosInsumo->id }})" class="btn btn-link">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pestaña de Categorías -->
            <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
                <div class="table-responsive">

                    <button onclick="loadForm('categorias_insumos')">Crear Categoria Insumo</button>

                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Categoría</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Descripcion</th>
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
                                    <td>{{$categoriaInsumo->descripcion}}</td>
                                    <td>
                                        <button onclick="verCategoria({{ $categoriaInsumo->id }})" class="btn btn-link">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editarCategoria({{ $categoriaInsumo->id }})" class="btn btn-link">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal para ver Elemento Insumo --}}

    <div class="modal fade" id="dynamicFormModalInsumo" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabel">Formulario Dinámico de Insumo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicFormInsumo">
                        <!-- Los campos del formulario se generarán aquí -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="submitFormInsumo">Guardar</button>
                </div>
            </div>
        </div>
    </div>