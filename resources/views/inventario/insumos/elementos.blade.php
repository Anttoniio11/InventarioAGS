@extends('plantilla')
@section('panelLateral')
@endsection 

    <meta name="csrf-token" content="{{ csrf_token() }}">
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

                    <div class="d-flex align-items-center mb-3">
                        <div class="input-group me-2" style="max-width: 300px;">
                            <input type="text" class="form-control" id="searchTecnologicos" placeholder="Buscar..." aria-label="Buscar..." style="height: calc(2rem + 2px);">
                            <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                            </span>
                        </div>
                    
                        <div class="input-group me-2" style="max-width: 300px;">
                            <select class="form-select" id="filterOptions" aria-label="Filtrar opciones" style="height: calc(2rem + 2px);">
                                <option selected>Seleccionar opción...</option>
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                                <option value="4">Opción 4</option>
                            </select>
                            <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                            </span>
                        </div>
                    
                        <div class="ms-auto">
                            <button type="button" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#modalElementoInsumo">
                                Crear Elemento Insumo
                            </button>
                            <button type="button" class="btn btn-submit ms-2">
                                Asignar
                            </button>
                        </div>
                    </div>

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
                                    <button onclick="window.open('{{ route('elementoInsumo.ver', $elementosInsumo->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>
                                    <button onclick="editarElemento({{ $elementosInsumo->id }})" class="btn btn-link" title="Actualizar">
                                        <i class="fas fa-edit icon-color"></i>
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

                    <div class="d-flex align-items-center mb-3">
                        <div class="input-group me-2" style="max-width: 300px;">
                            <input type="text" class="form-control" id="searchTecnologicos" placeholder="Buscar..." aria-label="Buscar..." style="height: calc(2rem + 2px);">
                            <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                            </span>
                        </div>
                    
                        <div class="input-group me-2" style="max-width: 300px;">
                            <select class="form-select" id="filterOptions" aria-label="Filtrar opciones" style="height: calc(2rem + 2px);">
                                <option selected>Seleccionar opción...</option>
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                                <option value="4">Opción 4</option>
                            </select>
                            <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                            </span>
                        </div>
                    
                        <div class="ms-auto">
                            <button type="button" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#modalElementoInsumo">
                                Crear Elemento Insumo
                            </button>
                            <button type="button" class="btn btn-submit ms-2">
                                Asignar
                            </button>
                        </div>
                    </div>

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
                                    <button onclick="window.open('{{ route('elementoInsumo.ver', $elementosInsumo->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>
                                    <button onclick="editElement({{ $elementosInsumo->id }})" class="btn btn-link" title="Actualizar">
                                        <i class="fas fa-edit icon-color"></i>
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

                    <div class="d-flex align-items-center mb-3">
                        <div class="input-group me-2" style="max-width: 300px;">
                            <input type="text" class="form-control" id="searchTecnologicos" placeholder="Buscar..." aria-label="Buscar..." style="height: calc(2rem + 2px);">
                            <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                            </span>
                        </div>
                    
                        <div class="input-group me-2" style="max-width: 300px;">
                            <select class="form-select" id="filterOptions" aria-label="Filtrar opciones" style="height: calc(2rem + 2px);">
                                <option selected>Seleccionar opción...</option>
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                                <option value="4">Opción 4</option>
                            </select>
                            <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none; height: calc(2rem + 2px); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                            </span>
                        </div>
                    
                        <div class="ms-auto">
                            <button type="button" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#modalElementoInsumo">
                                Crear Elemento Insumo
                            </button>
                            <button type="button" class="btn btn-submit ms-2">
                                Asignar
                            </button>
                        </div>
                    </div>

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
                                    <button onclick="window.open('{{ route('elementoInsumo.ver', $elementosInsumo->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>
                                    <button onclick="editElement({{ $elementosInsumo->id }})" class="btn btn-link" title="Actualizar">
                                        <i class="fas fa-edit icon-color"></i>
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

                <button type="button" class="btn btn-submit" data-bs-toggle="modal"
                    data-bs-target="#modalCategoriaInsumo">
                    Crear Categoria Insumo
                </button>

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
                                    <button onclick="editarCategoria({{ $categoriaInsumo->id }})" class="btn btn-link" title="Actualizar">
                                        <i class="fas fa-edit icon-color"></i>
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

    {{-- Modal para crear Elemento Insumo --}}

    <x-modal modalId="modalElementoInsumo" title="Crear Elemento Insumo"
        action="{{ route('guardar.elemento.insumo') }}" buttonText="Guardar">
        <div class="row">

            <div class="col-md-3 mb-3">
                <label for="registro_sanitario" class="form-label">Registro Sanitario</label>
                <input type="text" class="form-control" id="registro_sanitario" name="registro_sanitario" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="fecha_vencimiento" class="form-label">Fecha De Vencimiento</label>
                <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="indicaciones" class="form-label">Indicaciones</label>
                <input type="text" class="form-control" id="indicaciones" name="indicaciones" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="observacion" class="form-label">Observacion</label>
                <input type="text" class="form-control" id="observacion" name="observacion">
            </div>

            <div class="col-md-3 mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" required>
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
        </div>
    </x-modal>

    {{-- Modal para crear Categoria Insumo --}}
        
    <x-modal modalId="modalCategoriaInsumo" title="Crear Categoria Insumo"
    action="{{ route('guardar.categoria.insumo') }}" buttonText="Guardar">

    <div class="row">

        <div class="col-md-3 mb-3">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required>
        </div>

        <div class="col-md-3 mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" required>
        </div>

        <div class="col-md-3 mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>

    </div>
    </x-modal>
