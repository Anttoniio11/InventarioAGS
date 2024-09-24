@extends('plantilla')
@section('panelLateral')
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">

<div class="content">

    <!-- Pestañas Empleados-->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="empleados-tab" data-bs-toggle="tab" href="#empleados" role="tab" aria-controls="empleados" aria-selected="true">Empleados</a>
        </li>
    </ul>

    <div class="tab-content mt-3" id="myTabContent">

        <div class="tab-pane fade show active" id="empleados" role="tabpanel" aria-labelledby="empleados-tab">
            <div class="table-responsive">

                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-submit ms-2" data-bs-toggle="modal" data-bs-target="#modalEmpleado">
                        Crear Empleado
                    </button>
                </div>

                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Area</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre1 }} {{ $empleado->nombre2 }}</td>
                            <td>{{ $empleado->apellido1 }} {{ $empleado->apellido2 }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->sede }}</td>
                            <td>{{ $empleado->area }}</td>
                            <td>
                                <button onclick="" class="btn btn-link" title="Acta De Entrega">
                                    <i class="fas fa-file-alt icon-color"></i>
                                </button>
                                <button onclick="editarEmpleado({{ $empleado->id }})" class="btn btn-link" title="Actualizar">
                                    <i class="fas fa-edit icon-color"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    {{-- Modal para crear Empleado --}}
    <x-modal modalId="modalEmpleado" title="Crear Empleado" action="{{ route('guardar.empleado') }}" buttonText="Guardar">
        <form method="POST" action="{{ route('guardar.empleado') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre1" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="nombre1" name="nombre1" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre2" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="nombre2" name="nombre2" nullable>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido1" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido2" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2" nullable>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="identificacion" class="form-label">Identificacion</label>
                    <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option value="">Seleccione el sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" nullable>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" required>
                </div>

                <div class="col-md-3 mb-4">
                    <label for="id_sede" class="form-label">Sede</label>
                    <select class="form-select" id="id_sede" name="id_sede">
                        <option value="">Seleccione una sede</option>
                        @foreach ($sedes as $sede)
                            <option value="{{ $sede->id }}">{{ $sede->municipio }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label for="id_area" class="form-label">Area</label>
                    <select class="form-select" id="id_area" name="id_area">
                        <option value="">Seleccione un area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label for="id_rol" class="form-label">Rol</label>
                    <select class="form-select" id="id_rol" name="id_rol">
                        <option value="">Seleccione un area</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </x-modal>
    