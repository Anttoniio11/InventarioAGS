@extends('plantilla')
@section('panelLateral')
@endsection 

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/inventarioInsumo.js') }}"></script>
<link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">

<div class="content">

    <!-- Pestañas Elementos y Categorías-->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="elementos1-tab" data-bs-toggle="tab" href="#elementos1" role="tab" aria-controls="elementos1" aria-selected="true">Medicos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="elementos2-tab" data-bs-toggle="tab" href="#elementos2" role="tab" aria-controls="elementos2" aria-selected="false">Oficina</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="elementos3-tab" data-bs-toggle="tab" href="#elementos3" role="tab" aria-controls="elementos3" aria-selected="false">Limpieza</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="categorias-tab" data-bs-toggle="tab" href="#categorias" role="tab" aria-controls="categorias" aria-selected="false">Categorías</a>
        </li>
    </ul>
    
    <div class="tab-content mt-3" id="myTabContent">

        <!-- Pestaña de Elementos 1 -->
        <div class="tab-pane fade show active" id="elementos1" role="tabpanel" aria-labelledby="elementos1-tab">
            <div class="table-responsive">
                <button onclick="loadFormInsumo('elementos_insumos')">Crear Elemento Medico</button>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID Elemento</th>
                            <th scope="col">Categoría</th>
                            {{-- <th scope="col">Tipo de elemento</th> --}}
                            <th scope="col">Registro sanitario</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Indicaciones</th>
                            <th scope="col">Observación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elementosInsumos as $elementosInsumo)
                        <tr>
                            <td>{{$elementosInsumo->id}}</td>
                            <td>{{$elementosInsumo->categoria}}</td>
                            {{-- <td>{{$elementosInsumo->tipo_elemento}}</td> --}}
                            <td>{{$elementosInsumo->registro_sanitario}}</td>
                            <td>{{$elementosInsumo->marca}}</td>
                            <td>{{$elementosInsumo->fecha_vencimiento}}</td>
                            <td>{{$elementosInsumo->indicaciones}}</td>
                            <td>{{$elementosInsumo->observacion}}</td>
                            <td>
                                <button onclick="window.open('{{ route('elementoInsumo.ver', $elementosInsumo->id) }}', '_blank')" class="btn btn-link">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="editarElemento({{ $elementosInsumo->id }})" class="btn btn-link">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pestaña de Elementos 2 -->
        <div class="tab-pane fade" id="elementos2" role="tabpanel" aria-labelledby="elementos2-tab">
            <div class="table-responsive">
                <button onclick="loadFormInsumo('elementos_insumos')">Crear Elemento Oficina</button>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID Elemento</th>
                            <th scope="col">Categoría</th>
                            {{-- <th scope="col">Tipo de elemento</th> --}}
                            <th scope="col">Registro sanitario</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Indicaciones</th>
                            <th scope="col">Observación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elementosInsumos as $elementosInsumo)
                        <tr>
                            <td>{{$elementosInsumo->id}}</td>
                            <td>{{$elementosInsumo->categoria}}</td>
                            {{-- <td>{{$elementosInsumo->tipo_elemento}}</td> --}}
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

        <!-- Pestaña de Elementos 3 -->
        <div class="tab-pane fade" id="elementos3" role="tabpanel" aria-labelledby="elementos3-tab">
            <div class="table-responsive">
                <button onclick="loadFormInsumo('elementos_insumos')">Crear Elemento Limpieza</button>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID Elemento</th>
                            <th scope="col">Categoría</th>
                            {{-- <th scope="col">Tipo de elemento</th> --}}
                            <th scope="col">Registro sanitario</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Indicaciones</th>
                            <th scope="col">Observación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elementosInsumos as $elementosInsumo)
                        <tr>
                            <td>{{$elementosInsumo->id}}</td>
                            <td>{{$elementosInsumo->categoria}}</td>
                            {{-- <td>{{$elementosInsumo->tipo_elemento}}</td> --}}
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
                            <th scope="col">Código</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
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
