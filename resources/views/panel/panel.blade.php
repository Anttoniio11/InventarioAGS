@extends('plantilla')
@section('panelLateral')
@endsection

<link href="{{ asset('css/panel/style.css') }}" rel="stylesheet">


<div class="content">
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{ route('inventarioTecnologico.index') }}" class="text-decoration-none">
                <div class="card card-hover border-light" style="border: 2px solid #01A497;">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Tecnológicos</h5>
                            <div class="number">{{ $cantidadElementosTecnologicos }}</div>
                        </div>
                        <div class="icon">
                            <i class="fas fa-microchip"></i>
                            {{-- <i class="fas fa-laptop"></i> --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-3">
            <a href="{{ route('inventarioFisico.index') }}" class="text-decoration-none">
                <div class="card card-hover border-light" style="border: 2px solid #01A497;">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Físicos</h5>
                            <div class="number">{{ $cantidadElementosFisicos }}</div>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cube"></i>
                            {{-- <i class="fas fa-box"></i> --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-3">
            <a href="{{ route('inventarioMedico.index') }}" class="text-decoration-none">
                <div class="card card-hover border-light" style="border: 2px solid #01A497;">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Médicos</h5>
                            <div class="number">{{ $cantidadElementosMedicos }}</div>
                        </div>
                        <div class="icon">
                            <i class="fas fa-medkit"></i> 
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-3">
            <a href="{{ route('inventarioInsumo.index') }}" class="text-decoration-none">
                <div class="card card-hover border-light" style="border: 2px solid #01A497;">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Insumos</h5>
                            <div class="number">{{ $cantidadElementosInsumos }}</div>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bottle-water"></i>
                            {{-- <i class="fas fa-cogs"></i>  --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">