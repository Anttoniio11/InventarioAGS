@extends('plantilla')
@section('panelLateral')
@endsection
 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/inventarioFisico.js') }}"></script>
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

                <button onclick="loadFormFisico('elementos_fisicos')">Crear Elemento Fisico</button>

                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Elemento</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Ubicacion interna</th>
                                <th scope="col">Disponibilidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($elementosFisicos as $elementosFisico)
                            <tr>
                                <td>{{$elementosFisico->id}}</td>
                                <td>{{$elementosFisico->categoria}}</td>
                                <td>{{$elementosFisico->codigo}}</td>
                                <td>{{$elementosFisico->marca}}</td>
                                <td>{{$elementosFisico->modelo}}</td>
                                <td>{{$elementosFisico->ubicacion_interna}}</td>
                                <td>{{$elementosFisico->disponibilidad}}</td>
                                <td>
                                    <button onclick="window.open('{{ route('elementoFisico.ver', $elementosFisico->id) }}', '_blank')" class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editarElemento({{ $elementosFisico->id }})" class="btn btn-link">
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

                    <button onclick="loadForm('categorias_fisicos')">Crear Categoria Fisico</button>

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
                            <tr>
                                @foreach ($categoriasFisicos as $categoriaFisico)
                                <tr>
                                    <td>{{$categoriaFisico->id}}</td>
                                    <td>{{$categoriaFisico->categoria}}</td>
                                    <td>{{$categoriaFisico->descripcion}}</td>
                                    <td>
                                        <button onclick="verCategoria({{ $categoriaFisico->id }})" class="btn btn-link">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editarCategoria({{ $categoriaFisico->id }})" class="btn btn-link">
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


    <div class="modal fade" id="dynamicFormModalFisico" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabel">Formulario Dinámico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicFormFisico">
                        <!-- Los campos del formulario se generarán aquí -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="submitFormFisico">Guardar</button>
                </div>
            </div>
        </div>
    </div>
