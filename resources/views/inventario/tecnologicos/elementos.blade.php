@extends('plantilla')
@section('panelLateral')
@endsection

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">

    <div class="content">

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

                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-submit ms-2" data-bs-toggle="modal"
                            data-bs-target="#modalElementoTecnologico">
                            Crear Elemento Tecnológico
                        </button>
                        <button type="button" class="btn btn-submit">
                            Asignar
                        </button>
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

                            @foreach ($elementosTecnologicos as $elementosTecnologico)
                                <tr>
                                    <td>{{ $elementosTecnologico->id }}</td>
                                    <td>{{ $elementosTecnologico->categoria }}</td>
                                    <td>{{ $elementosTecnologico->codigo }}</td>
                                    <td>{{ $elementosTecnologico->marca }}</td>
                                    <td>{{ $elementosTecnologico->referencia }}</td>
                                    <td>{{ $elementosTecnologico->serial }}</td>
                                    <td>{{ $elementosTecnologico->ubicacion }}</td>
                                    <td>
                                        <button onclick="window.open('{{ route('elementoTecnologico.ver', $elementosTecnologico->id) }}', '_blank')" class="btn btn-link" title="Hoja de vida">
                                            <i class="fas fa-file-alt icon-color"></i>
                                        </button>
                                        <button onclick="editarElemento({{ $elementosTecnologico->id }})"
                                            class="btn btn-link" title="Actualizar">
                                            <i class="fas fa-edit icon-color"></i>
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

                <button type="button" class="btn btn-submit" data-bs-toggle="modal"
                    data-bs-target="#modalCategoriaTecnologico">
                    Crear Categoria Tecnologico
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
                            @foreach ($categoriasTecnologicos as $categoriaTecnologico)
                                <tr>
                                    <td>{{ $categoriaTecnologico->id }}</td>
                                    <td>{{ $categoriaTecnologico->categoria }}</td>
                                    <td>{{ $categoriaTecnologico->descripcion }}</td>
                                    <td>
                                        <button onclick="editarCategoria({{ $categoriaTecnologico->id }})"
                                            class="btn btn-link" title="Actualizar">
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

    {{-- Modal para crear Elemento Tecnologico --}}

    <x-modal modalId="modalElementoTecnologico" title="Crear Elemento Tecnológico"
        action="{{ route('guardar.elemento.tecnologico') }}" buttonText="Guardar">
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
                <label for="referencia" class="form-label">Referencia</label>
                <input type="text" class="form-control" id="referencia" name="referencia" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="serial" class="form-label">Serial</label>
                <input type="text" class="form-control" id="serial" name="serial">
            </div>

            <div class="col-md-3 mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
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

            <div class="col-md-3 mb-3">
                <label for="procesador" class="form-label">Procesador</label>
                <input type="text" class="form-control" id="procesador" name="procesador">
            </div>

            <div class="col-md-3 mb-3">
                <label for="ram" class="form-label">RAM</label>
                <input type="text" class="form-control" id="ram" name="ram">
            </div>

            <div class="col-md-3 mb-3">
                <label for="tipo_almacenamiento" class="form-label">Tipo de Almacenamiento</label>
                <input type="text" class="form-control" id="tipo_almacenamiento" name="tipo_almacenamiento">
            </div>

            <div class="col-md-3 mb-3">
                <label for="almacenamiento" class="form-label">Almacenamiento</label>
                <input type="text" class="form-control" id="almacenamiento" name="almacenamiento">
            </div>

            <div class="col-md-3 mb-3">
                <label for="tarjeta_grafica" class="form-label">Tarjeta Gráfica</label>
                <input type="text" class="form-control" id="tarjeta_grafica" name="tarjeta_grafica">
            </div>

            <div class="col-md-3 mb-3">
                <label for="garantia" class="form-label">Garantía</label>
                <input type="text" class="form-control" id="garantia" name="garantia">
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

    {{-- Modal para crear Categoria Tecnologica --}}
    
    <x-modal modalId="modalCategoriaTecnologico" title="Crear Categoria Tecnologico"
        action="{{ route('guardar.categoria.tecnologico') }}" buttonText="Guardar">
        
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