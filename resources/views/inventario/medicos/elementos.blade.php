@extends('plantilla')
@section('panelLateral')
@endsection
 
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/inventarioMedico.js') }}"></script>
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

                <button onclick="loadFormMedico('elementos_medicos')">Crear Elemento Medico</button>
                
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Elemento</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Registro sanitario</th>
                                <th scope="col">Ubicacion interna</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($elementosMedicos as $elementosMedico)
                            <tr>
                                <td>{{$elementosMedico->id}}</td>
                                <td>{{$elementosMedico->categoria}}</td>
                                <td>{{$elementosMedico->codigo}}</td>
                                <td>{{$elementosMedico->marca}}</td>
                                <td>{{$elementosMedico->modelo}}</td>
                                <td>{{$elementosMedico->registro_sanitario}}</td>
                                <td>{{$elementosMedico->ubicacion_interna}}</td>
                                <td>
                                    <button onclick="viewElement({{ $elementosMedico->id }})" class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editElement({{ $elementosMedico->id }})" class="btn btn-link">
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
            
                <button onclick="loadForm('categorias_medicos')">Crear Categoria Medico</button>

                <div class="table-responsive">
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
                            @foreach ($categoriasMedicos as $categoriaMedico)
                            <tr>
                                <td>{{$categoriaMedico->id}}</td>
                                <td>{{$categoriaMedico->codigo}}</td>
                                <td>{{$categoriaMedico->categoria}}</td>
                                <td>{{$categoriaMedico->descripcion}}</td>
                                <td>
                                    <button onclick="verCategoria({{ $categoriaMedico->id }})" class="btn btn-link">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editarCategoria({{ $categoriaMedico->id }})" class="btn btn-link">
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

    {{-- Modal para ver Elemento Medico --}}

    <div class="modal fade" id="dynamicFormModalMedico" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabel">Formulario Dinámico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicFormMedico">
                        <!-- Los campos del formulario se generarán aquí -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="submitFormMedico">Guardar</button>
                </div>
            </div>
        </div>
    </div>
