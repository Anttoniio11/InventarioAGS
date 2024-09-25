@extends('plantilla')
@section('panelLateral')
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">

<div class="content">

    <!-- Pestañas Elementos y Categorías-->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tecnologicos-tab" data-bs-toggle="tab" href="#tecnologicos" role="tab" aria-controls="tecnologicos" aria-selected="true">Tecnologicos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="fisicos-tab" data-bs-toggle="tab" href="#fisicos" role="tab" aria-controls="fisicos" aria-selected="false">Fisicos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="medicos-tab" data-bs-toggle="tab" href="#medicos" role="tab" aria-controls="medicos" aria-selected="false">Medicos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="insumos-tab" data-bs-toggle="tab" href="#insumos" role="tab" aria-controls="insumos" aria-selected="false">Insumos</a>
        </li>
    </ul>
    
    <div class="tab-content mt-3" id="myTabContent">

        <!-- Pestaña de Tecnologicos -->
        <div class="tab-pane fade show active" id="tecnologicos" role="tabpanel" aria-labelledby="tecnologicos-tab">
            <div class="table-responsive">

                <div class="d-flex mb-2" style="max-width: 760px;">
                    <div class="input-group me-2" style="max-width: 300px;">
                        <input type="text" class="form-control" id="search" placeholder="Buscar..." aria-label="Buscar...">
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                
                    <div class="input-group" style="max-width: 300px;">
                        <select class="form-select" id="filterOptions" aria-label="Filtrar opciones">
                            <option selected>Seleccionar opción...</option>
                            <option value="1">Opción 1</option>
                            <option value="2">Opción 2</option>
                            <option value="3">Opción 3</option>
                            <option value="4">Opción 4</option>
                        </select>
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                </div>

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
                        {{-- @foreach ($elementosTecnologicos as $elemento)
                            <tr id="row-{{ $elemento->id }}">
                                <td>{{ $elemento->id }}</td>
                                <td class="id_categoria">{{ $elemento->categoria }}</td>
                                <td class="codigo">{{ $elemento->codigo }}</td>
                                <td class="marca">{{ $elemento->marca }}</td>
                                <td class="referencia">{{ $elemento->referencia }}</td>
                                <td class="serial">{{ $elemento->serial }}</td>
                                <td class="ubicacion">{{ $elemento->ubicacion }}</td>
                                <td>
                                    <button onclick="window.open('{{ route('elementoTecnologico.ver', $elemento->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>    
            </div>
        </div>

        <!-- Pestaña de Fisicos -->
        <div class="tab-pane fade" id="fisicos" role="tabpanel" aria-labelledby="fisicos-tab">
            <div class="table-responsive">

                <div class="d-flex mb-2" style="max-width: 760px;">
                    <div class="input-group me-2" style="max-width: 300px;">
                        <input type="text" class="form-control" id="search" placeholder="Buscar..." aria-label="Buscar...">
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                
                    <div class="input-group" style="max-width: 300px;">
                        <select class="form-select" id="filterOptions" aria-label="Filtrar opciones">
                            <option selected>Seleccionar opción...</option>
                            <option value="1">Opción 1</option>
                            <option value="2">Opción 2</option>
                            <option value="3">Opción 3</option>
                            <option value="4">Opción 4</option>
                        </select>
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                </div>

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
                        {{-- @foreach ($elementosFisicos as $elementosFisico)
                            <tr>
                                <td>{{ $elementosFisico->id }}</td>
                                <td>{{ $elementosFisico->categoria }}</td>
                                <td>{{ $elementosFisico->codigo }}</td>
                                <td>{{ $elementosFisico->marca }}</td>
                                <td>{{ $elementosFisico->modelo }}</td>
                                <td>{{ $elementosFisico->ubicacion_interna }}</td>
                                <td>{{ $elementosFisico->disponibilidad }}</td>
                                <td>
                                    <button onclick="window.open('{{ route('elementoFisico.ver', $elementosFisico->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pestaña de Medicos -->
        <div class="tab-pane fade" id="medicos" role="tabpanel" aria-labelledby="medicos-tab">
            <div class="table-responsive">
                
                <div class="d-flex mb-2" style="max-width: 760px;">
                    <div class="input-group me-2" style="max-width: 300px;">
                        <input type="text" class="form-control" id="search" placeholder="Buscar..." aria-label="Buscar...">
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                
                    <div class="input-group" style="max-width: 300px;">
                        <select class="form-select" id="filterOptions" aria-label="Filtrar opciones">
                            <option selected>Seleccionar opción...</option>
                            <option value="1">Opción 1</option>
                            <option value="2">Opción 2</option>
                            <option value="3">Opción 3</option>
                            <option value="4">Opción 4</option>
                        </select>
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                </div>

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
                        {{-- @foreach ($elementosMedicos as $elementosMedico)
                            <tr>
                                <td>{{ $elementosMedico->id }}</td>
                                <td>{{ $elementosMedico->categoria }}</td>
                                <td>{{ $elementosMedico->codigo }}</td>
                                <td>{{ $elementosMedico->marca }}</td>
                                <td>{{ $elementosMedico->modelo }}</td>
                                <td>{{ $elementosMedico->registro_sanitario }}</td>
                                <td>{{ $elementosMedico->ubicacion_interna }}</td>
                                <td>
                                    <button onclick="window.open('{{ route('elementoMedico.ver', $elementosMedico->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>
                                    <button onclick="editarElemento({{ $elementosMedico->id }})" class="btn btn-link" title="Actualizar">
                                        <i class="fas fa-edit icon-color"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pestaña de Insumos -->
        <div class="tab-pane fade" id="insumos" role="tabpanel" aria-labelledby="insumos-tab">
            <div class="table-responsive">

                <div class="d-flex mb-2" style="max-width: 760px;">
                    <div class="input-group me-2" style="max-width: 300px;">
                        <input type="text" class="form-control" id="search" placeholder="Buscar..." aria-label="Buscar...">
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-search" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                
                    <div class="input-group" style="max-width: 300px;">
                        <select class="form-select" id="filterOptions" aria-label="Filtrar opciones">
                            <option selected>Seleccionar opción...</option>
                            <option value="1">Opción 1</option>
                            <option value="2">Opción 2</option>
                            <option value="3">Opción 3</option>
                            <option value="4">Opción 4</option>
                        </select>
                        <span class="input-group-text" style="background-color: #fff; border: 1px solid #ced4da; border-left: none;">
                            <i class="fas fa-filter" style="color: #01A497; font-size: 14px;"></i>
                        </span>
                    </div>
                </div>
                
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID Elemento</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Registro sanitario</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Indicaciones</th>
                            <th scope="col">Observación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($elementosInsumos as $elementosInsumo)
                            <tr>
                                <td>{{ $elementosInsumo->id }}</td>
                                <td>{{ $elementosInsumo->categoria }}</td>
                                <td>{{ $elementosInsumo->registro_sanitario }}</td>
                                <td>{{ $elementosInsumo->marca }}</td>
                                <td>{{ $elementosInsumo->fecha_vencimiento }}</td>
                                <td>{{ $elementosInsumo->indicaciones }}</td>
                                <td>{{ $elementosInsumo->observacion }}</td>
                                <td>
                                    <button onclick="window.open('{{ route('elementoInsumo.ver', $elementosInsumo->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>
                                    <button onclick="editarElemento({{ $elementosInsumo->id }})" class="btn btn-link" title="Actualizar">
                                        <i class="fas fa-edit icon-color"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>



                


                