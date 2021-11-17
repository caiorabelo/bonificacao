@extends('adminlte::page')

@section('title', 'Funcionário')

@section('content_header')
    <h1>Alterar Funcionário</h1>
@stop

@section('content')

    {{-- Formulario Funcionário --}}
    <form action="{{ route('funcionarios.update', $funcionario->id) }}"
        method="post" enctype="multipart/form-data" id="formEditar">
        @method('PUT')
        @include('admin.inputs.funcionario')
    </form>

@stop

@section('css')

@stop

@section('js')

    {{-- Formatar números --}}
    <script src="{{ url('js/formatacamponumero.js') }}"></script>

    {{-- ALERTAS --}}
    @include('admin.alerts.alerts')

@stop
