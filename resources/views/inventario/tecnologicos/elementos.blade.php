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
                        <button type="button" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#modalElementoTecnologico">
                            Crear Elemento Tecnologico
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

                        @foreach ($elementosTecnologicos as $elemento)
                            <tr id="row-{{ $elemento->id }}">
                                <td>{{ $elemento->id }}</td>
                                <td class="id_categoria">{{ $elemento->categoria }}</td>
                                <td class="codigo">{{ $elemento->codigo }}</td>
                                <td class="marca">{{ $elemento->marca }}</td>
                                <td class="referencia">{{ $elemento->referencia }}</td>
                                <td class="serial">{{ $elemento->serial }}</td>
                                <td class="ubicacion">{{ $elemento->ubicacion }}</td>
                                <td>
                                    <button
                                        onclick="window.open('{{ route('elementoTecnologico.ver', $elemento->id) }}', '_blank')"
                                        class="btn btn-link" title="Hoja de vida">
                                        <i class="fas fa-file-alt icon-color"></i>
                                    </button>

                                    <button type="button" class="btn btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-id="{{ $elemento->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>

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
            <select class="form-select" id="id_estado" name="id_estado">
                <option value="">Seleccione el estado</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                @endforeach
            </select>
        </div>
    </div>
</x-modal>



{{-- MODAL PARA EDITAR ELEMENTO TECNOLOGICO  --}}
{{-- 
<x-modal modalId="modalEditarElementoTecnologico" title="Editar Elemento Tecnológico"
action="{{ route('actualizar.elemento.tecnologico', $elemento->id) }}" buttonText="Guardar" >
@method('PUT')
<div class="row">

    <div class="col-md-3 mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo', $elemento->codigo) }}" required>
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
    <select class="form-select" id="id_estado" name="id_estado">
        <option value="">Seleccione el estado</option>
        @foreach ($estados as $estado)
            <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
        @endforeach
    </select> 
</div>
</div>
</x-modal> --}}


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-center w-100" id="editModalLabel">Editar Elemento</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="elementId">


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
                            <input type="text" class="form-control" id="tipo_almacenamiento"
                                name="tipo_almacenamiento">
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
                                    <option value="{{ $empleado->id }}">{{ $empleado->nombre1 }}
                                        {{ $empleado->apellido1 }}</option>
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
                            <select class="form-select" id="id_estado" name="id_estado">
                                <option value="">Seleccione el estado</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

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


<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const modalId = this.getAttribute('data-bs-target');

            // Hacer la solicitud para obtener los datos del elemento
            fetch(`/elemento/tecnologico/editar/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Elemento no encontrado');
                    }
                    return response.json();
                })
                .then(data => {
                    const modal = document.querySelector(modalId);

                    // Poblar el formulario del modal con los datos
                    modal.querySelector('#elementId').value = data.id;
                    modal.querySelector('#codigo').value = data.codigo;
                    modal.querySelector('#marca').value = data.marca;
                    modal.querySelector('#referencia').value = data.referencia;
                    modal.querySelector('#serial').value = data.serial || '';
                    modal.querySelector('#ubicacion').value = data.ubicacion;
                    modal.querySelector('#disponibilidad').value = data.disponibilidad;
                    modal.querySelector('#codigo_QR').value = data.codigo_QR;
                    modal.querySelector('#procesador').value = data.procesador || '';
                    modal.querySelector('#ram').value = data.ram || '';
                    modal.querySelector('#tipo_almacenamiento').value = data.tipo_almacenamiento || '';
                    modal.querySelector('#almacenamiento').value = data.almacenamiento || '';
                    modal.querySelector('#tarjeta_grafica').value = data.tarjeta_grafica || '';
                    modal.querySelector('#garantia').value = data.garantia || '';
                    modal.querySelector('#id_empleado').value = data.id_empleado || '';
                    modal.querySelector('#id_area').value = data.id_area || '';
                    modal.querySelector('#id_sede').value = data.id_sede || '';
                    modal.querySelector('#id_factura').value = data.id_factura;
                    modal.querySelector('#id_categoria').value = data.id_categoria;
                    modal.querySelector('#id_estado').value = data.id_estado;

                    // Obtener el formulario y remover cualquier evento 'submit' previo
                    const editForm = modal.querySelector('form');
                    const newFormSubmitHandler = (event) => {
                        event.preventDefault();  // Evitar la recarga de la página

                        // Preparar los datos del formulario
                        const formData = new FormData(editForm);

                        // Hacer la solicitud AJAX para actualizar el elemento
                        fetch(`/elemento/tecnologico/actualizar/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error al actualizar');
                            }
                            return response.json();
                        })
                        .then(result => {
                            if (result.success) {
                                // Cerrar el modal automáticamente
                                const bootstrapModal = bootstrap.Modal.getInstance(modal);
                                bootstrapModal.hide();

                                // Actualizar la fila de la tabla con los nuevos datos
                                const row = document.querySelector(`#row-${id}`);
                                row.querySelector('.codigo').textContent = formData.get('codigo');
                                row.querySelector('.marca').textContent = formData.get('marca');
                                row.querySelector('.referencia').textContent = formData.get('referencia');
                                row.querySelector('.serial').textContent = formData.get('serial') || '';
                                row.querySelector('.ubicacion').textContent = formData.get('ubicacion');
                                row.querySelector('.disponibilidad').textContent = formData.get('disponibilidad');
                                row.querySelector('.codigo_QR').textContent = formData.get('codigo_QR');
                                row.querySelector('.procesador').textContent = formData.get('procesador') || '';
                                row.querySelector('.ram').textContent = formData.get('ram') || '';
                                row.querySelector('.tipo_almacenamiento').textContent = formData.get('tipo_almacenamiento') || '';
                                row.querySelector('.almacenamiento').textContent = formData.get('almacenamiento') || '';
                                row.querySelector('.tarjeta_grafica').textContent = formData.get('tarjeta_grafica') || '';
                                row.querySelector('.garantia').textContent = formData.get('garantia') || '';
                                row.querySelector('.id_empleado').textContent = formData.get('id_empleado') || '';
                                row.querySelector('.id_area').textContent = formData.get('id_area') || '';
                                row.querySelector('.id_sede').textContent = formData.get('id_sede') || '';
                                row.querySelector('.id_factura').textContent = formData.get('id_factura');
                                row.querySelector('.id_categoria').textContent = formData.get('id_categoria');
                                row.querySelector('.id_estado').textContent = formData.get('id_estado');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    };

                    // Limpiar el evento submit anterior y agregar uno nuevo
                    editForm.removeEventListener('submit', editForm._submitHandler || (() => {}));
                    editForm._submitHandler = newFormSubmitHandler;  // Guardar el nuevo manejador en la propiedad personalizada
                    editForm.addEventListener('submit', newFormSubmitHandler);
                })
                .catch(error => console.error('Error:', error));
        });
    });
});

</script>
