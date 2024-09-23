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

            <div class="tab-pane fade show active" id="elementos" role="tabpanel" aria-labelledby="elementos-tab">
                <div class="table-responsive">

                <button type="button" class="btn btn-submit" data-bs-toggle="modal"
                    data-bs-target="#modalElementoFisico">
                    Crear Elemento Fisico
                </button>

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
                                        <i class="fas fa-file-alt"></i>
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

                    <button type="button" class="btn btn-submit" data-bs-toggle="modal"
                    data-bs-target="#modalCategoriaFisico">
                    Crear Categoria Fisico
                </button>

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

    {{-- Modal para crear Elemento Tecnologico --}}
    
    <x-modal modalId="modalElementoFisico" title="Crear Elemento Fisico"
        action="{{ route('guardar.elemento.fisico') }}" buttonText="Guardar">
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

    {{-- Modal para crear Categoria Fisica --}}
    
    <x-modal modalId="modalCategoriaFisico" title="Crear Categoria Fisico"
        action="{{ route('guardar.categoria.fisico') }}" buttonText="Guardar">
        
        <div class="row">
    
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



    
    