@extends('plantilla')
@section('panelLateral')
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/inventario.js') }}"></script>
<link href="{{ asset('css/elementos/style.css') }}" rel="stylesheet">