@extends('adminlte::page')

@section('title', 'Funcionário')

@section('content_header')
    <h1>Cadastro de Funcionários</h1>
@stop

@section('content')

    {{-- Formulário funcionário --}}
    <form action="{{ route('funcionarios.store') }}" method="post" enctype="multipart/form-data">
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
