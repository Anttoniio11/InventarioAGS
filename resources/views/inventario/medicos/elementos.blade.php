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
            <a class="nav-link active" id="elementos-tab" data-bs-toggle="tab" href="#elementos" role="tab"
                aria-controls="elementos" aria-selected="true">Elementos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="categorias-tab" data-bs-toggle="tab" href="#categorias" role="tab"
                aria-controls="categorias" aria-selected="false">Categorías</a>
        </li>
    </ul>
    
    <div class="tab-content mt-3" id="myTabContent">

            <div class="tab-pane fade show active" id="elementos" role="tabpanel" aria-labelledby="elementos-tab">
                <div class="table-responsive">

                <button type="button" class="btn btn-submit" data-bs-toggle="modal"
                    data-bs-target="#modalElementoMedico">
                    Crear Elemento Medico
                </button>

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
                                    <button onclick="window.open('{{ route('elementoMedico.ver', $elementosMedico->id) }}', '_blank')" class="btn btn-link">
                                        <i class="fas fa-file-alt"></i>
                                    </button>
                                    <button onclick="editarElemento({{ $elementosMedico->id }})" class="btn btn-link">
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

    {{-- Modal para crear Elemento Medico --}}

    <x-modal modalId="modalElementoMedico" title="Crear Elemento Medico"
        action="{{ route('guardar.elemento.medico') }}" buttonText="Guardar">
        <div class="row">

            <div class="col-md-3 mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>


            <div class="col-md-3 mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="serie" class="form-label">Serie</label>
                <input type="text" class="form-control" id="serie" name="serie">
            </div>

            <div class="col-md-3 mb-3">
                <label for="registro_sanitario" class="form-label">Registro Sanitario</label>
                <input type="text" class="form-control" id="registro_sanitario" name="registro_sanitario" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="ubicacion_interna" class="form-label">Ubicación Interna</label>
                <input type="text" class="form-control" id="ubicacion_interna" name="ubicacion_interna" required>
            </div> 

            <div class="col-md-3 mb-3">
                <label for="disponibilidad" class="form-label">Disponibilidad</label>
                <select class="form-select" id="disponibilidad" name="disponibilidad" required>
                    <option value="">Seleccione disponibilidad</option>
                    <option value="SI">Sí</option>
                    <option value="NO">No</option>
                </select>
            </div>


            <div class="col-md-3 mb-3">
                <label for="codigo_QR" class="form-label">Código QR</label>
                <input type="text" class="form-control" id="codigo_QR" name="codigo_QR">
            </div>

            {{-- <div class="col-md-3 mb-3">
            <label for="id_empleado" class="form-label">Empleado</label>
            <select class="form-select" name="id_empleado" id="id_empleado">
                <option value="">Seleccione un empleado</option>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre1 }} {{ $empleado->apellido1 }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="id_area" class="form-label">Área</label>
            <select class="form-select" id="id_area" name="id_area">
                <option value="">Seleccione un área</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="id_sede" class="form-label">Sede</label>
            <select class="form-select" id="id_sede" name="id_sede">
                <option value="">Seleccione una sede</option>
                @foreach ($sedes as $sede)
                    <option value="{{ $sede->id }}">{{ $sede->municipio }}</option>
                @endforeach
            </select>
        </div> --}}

            <div class="col-md-3 mb-3">
                <label for="id_factura" class="form-label">Factura</label>
                <select class="form-select" id="id_factura" name="id_factura">
                    <option value="">Seleccione una factura</option>
                    @foreach ($facturas as $factura)
                        <option value="{{ $factura->id }}">{{ $factura->codigo_factura }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="id_categoria" class="form-label">Categoría</label>
                <select class="form-select" id="id_categoria" name="id_categoria">
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="id_estado" class="form-label">Estado</label>
                <select class="form-select" id="id_estado" name="id_estado">
                    <option value="">Seleccione el estado</option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-modal>

    <div class="modal fade" id="dynamicFormModalCategoria" tabindex="-1"
        aria-labelledby="dynamicFormModalLabelCategoria" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicFormModalLabelCategoria">Crear Categoría Medica</h5>
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