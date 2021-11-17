@extends('adminlte::page')

@section('title', 'Movimentação')

@section('content_header')
    <h1>Alterar Movimentação</h1>
@stop

@section('content')

    {{-- Formulario Movimentação --}}
    <form action="{{ route('movimentacoes.update', $movimentacao->id) }}"
        method="post" enctype="multipart/form-data" id="formEditar">
        @method('PUT')
        @include('admin.inputs.movimentacao')
    </form>

@stop

@section('css')

    <link rel="stylesheet" href="{{url('css/tail.select-primary.min.css')}}">

@stop

@section('js')

    {{-- Formatar números --}}
    <script src="{{ url('js/formatacamponumero.js') }}"></script>

    {{-- ALERTAS --}}
    @include('admin.alerts.alerts')

    {{-- SELECT2 --}}
    @include('admin.components.select2',['id'=>'funcionario_id','tamanho'=>320])

@stop
