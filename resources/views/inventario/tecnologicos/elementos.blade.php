@extends('plantilla')

@section('panelLateral')
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/inventarioTecnologico.js') }}"></script>

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

                <button type="button" class="btn btn-submit" data-bs-toggle="modal"
                    data-bs-target="#modalElementoTecnologico">
                    Crear Elemento Tecnológico
                </button>
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
                                    <button onclick="verElemento({{ $elementosTecnologico->id }})" class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-link" data-bs-toggle="modal"
                                    data-bs-target="#modalEditarElementoTecnologico" 
                                    onclick="location.href='{{ route('obtener.elemento.tecnologico', ['id' => $elementosTecnologico->id]) }}'">
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
                                <td>{{ $categoriaTecnologico->id }}</td>
                                <td>{{ $categoriaTecnologico->categoria }}</td>
                                <td>{{ $categoriaTecnologico->descripcion }}</td>
                                <td>
                                    <button onclick="verCategoria({{ $categoriaTecnologico->id }})"
                                        class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editarCategoria({{ $categoriaTecnologico->id }})"
                                        class="btn btn-link">
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
            <input type="text" class="form-control" id="codigo_QR" name="codigo_QR" required>
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

        <div class="col-md-3 mb-3">
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
    </div>

        <div class="col-md-3 mb-3">
            <label for="id_factura" class="form-label">Factura</label>
            <select class="form-select" id="id_factura" name="id_factura" required>
                <option value="">Seleccione una factura</option>
                @foreach ($facturas as $factura)
                    <option value="{{ $factura->id }}">{{ $factura->codigo_factura }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <select class="form-select" id="id_estado" name="id_estado" required>
                <option value="">Seleccione el estado</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                @endforeach
            </select>
        </div>
    </div>
</x-modal>
{{-- 
@if($elemento)
<x-modal modalId="modalEditarElementoTecnologico" title="Editar Elemento Tecnológico"
action="{{ route('actualizar.elemento.tecnologico', ['id' => $elemento->id]) }}" buttonText="Actualizar">
        @method('PUT')
<div class="row">

        <div class="col-md-3 mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $elemento->codigo }}" required>
        </div>


        <div class="col-md-3 mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca"  value="{{ $elemento->marca }}" required>
        </div>

        

        <div class="col-md-3 mb-3">
            <label for="serial" class="form-label">Serial</label>
            <input type="text" class="form-control" id="serial" name="serial"  value="{{ $elemento->serial }}">
        </div>

        <div class="col-md-3 mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $elemento->ubicacion }}" required>
        </div>


        <div class="col-md-3 mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label >
            <select class="form-select" id="disponibilidad" name="disponibilidad" required>
                <option value="">Seleccione disponibilidad</option>
                <option value="SI" {{ old('disponibilidad', $elemento->disponibilidad) == 'SI' ? 'selected' : '' }}>Sí</option>
                <option value="NO" {{ old('disponibilidad', $elemento->disponibilidad) == 'NO' ? 'selected' : '' }}>No</option>
            </select>
        </div>


        <div class="col-md-3 mb-3">
            <label for="codigo_QR" class="form-label">Código QR</label>
            <input type="text" class="form-control" id="codigo_QR" name="codigo_QR"  value="{{ $elemento->codigo_QR }}" required>
        </div>

        <div class="col-md-3 mb-3">
            <label for="procesador" class="form-label">Procesador</label>
            <input type="text" class="form-control" id="procesador" value="{{ $elemento->procesador }}" name="procesador">
        </div>


        <div class="col-md-3 mb-3">
            <label for="ram" class="form-label">RAM</label>
            <input type="text" class="form-control" id="ram" value="{{ $elemento->ram }}" name="ram">
        </div>

        <div class="col-md-3 mb-3">
            <label for="tipo_almacenamiento" class="form-label">Tipo de Almacenamiento</label>
            <input type="text" class="form-control" id="tipo_almacenamiento"  value="{{ $elemento->tipo_almacenamiento }}" name="tipo_almacenamiento">
        </div>

        <div class="col-md-3 mb-3">
            <label for="almacenamiento" class="form-label">Almacenamiento</label>
            <input type="text" class="form-control" id="almacenamiento" value="{{ $elemento->almacenamiento }}" name="almacenamiento">
        </div>

        <div class="col-md-3 mb-3">
            <label for="tarjeta_grafica" class="form-label">Tarjeta Gráfica</label>
            <input type="text" class="form-control" id="tarjeta_grafica"  value="{{ $elemento->tarjeta_grafica }}" name="tarjeta_grafica">
        </div>

        <div class="col-md-3 mb-3">
            <label for="garantia" class="form-label">Garantía</label>
            <input type="text" class="form-control" id="garantia"  value="{{ $elemento->garantia }}" name="garantia">
        </div>

        <div class="col-md-3 mb-3">
        <label for="id_empleado" class="form-label">Empleado</label>
        <select class="form-select" name="id_empleado" id="id_empleado">
            <option value="">Seleccione un empleado</option>
            @foreach ($empleados as $empleado)
            <option value="{{ $empleado->id }}" {{ old('id_empleado', $elemento->id_empleado) == $empleado->id ? 'selected' : '' }}>
                {{ $empleado->nombre1 }} {{ $empleado->apellido1 }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label for="id_area" class="form-label">Área</label>
        <select class="form-select" id="id_area" name="id_area">
            <option value="">Seleccione un área</option>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}" {{ old('id_area', $elemento->id_area) == $area->id ? 'selected' : '' }}>
                {{ $area->area }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label for="id_sede" class="form-label">Sede</label>
        <select class="form-select" id="id_sede" name="id_sede">
            <option value="">Seleccione una sede</option>
            @foreach ($sedes as $sede)
            <option value="{{ $sede->id }}" {{ old('id_sede', $elemento->id_sede) == $sede->id ? 'selected' : '' }}>
                {{ $sede->municipio }}
            </option>
            @endforeach
        </select>
    </div>

        <div class="col-md-3 mb-3">
            <label for="id_factura" class="form-label">Factura</label>
            <select class="form-select" id="id_factura" name="id_factura" required>
                <option value="">Seleccione una factura</option>
                @foreach ($facturas as $factura)
                <option value="{{ $factura->id }}" {{ old('id_factura', $elemento->id_factura) == $factura->id ? 'selected' : '' }}>
                    {{ $factura->codigo_factura }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('id_categoria', $elemento->id_categoria) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->categoria }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <select class="form-select" id="id_estado" name="id_estado" required>
                <option value="">Seleccione el estado</option>
                @foreach ($estados as $estado)
                <option value="{{ $estado->id }}" {{ old('id_estado', $elemento->id_estado) == $estado->id ? 'selected' : '' }}>
                    {{ $estado->estado }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</x-modal>
@else
    <p>No se encontró el elemento.</p>
@endif --}}
<div class="modal fade" id="dynamicFormModalCategoria" tabindex="-1"
    aria-labelledby="dynamicFormModalLabelCategoria" aria-hidden="true">
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
