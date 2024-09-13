@extends('plantilla')
@section('panelLateral')
@endsection

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
                <h1>Elementos Tecnologicos</h1>
                <div class="table-responsive">
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
                                <td>{{$elementosTecnologico->id}}</td>
                                <td>{{$elementosTecnologico->categoria}}</td>
                                <td>{{$elementosTecnologico->codigo}}</td>
                                <td>{{$elementosTecnologico->marca}}</td>
                                <td>{{$elementosTecnologico->referencia}}</td>
                                <td>{{$elementosTecnologico->serial}}</td>
                                <td>{{$elementosTecnologico->ubicacion}}</td>
                                <td>   </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pestaña de Categorías -->
            <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
                <h1>Categorias Tecnologicas</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Categoría</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoriasTecnologicos as $categoriaTecnologico)
                            <tr>
                                <td>{{$categoriaTecnologico->id}}</td>
                                <td>{{$categoriaTecnologico->categoria}}</td>
                                <td>   </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>