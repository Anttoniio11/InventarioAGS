@extends('plantilla')
@section('contenido')
    <div>
        <table>
            <thead></thead>
            {{-- @foreach ($elementosTecnologicos as $elementoTecnologico)
                    <td>{{ $elementoTecnologico->id }}</td>
            @endforeach --}}

            {{$elementosTecnologicos}}
        </table>
    </div>
@endsection