@extends('adminlte::page')

@section('title', 'Movimentação')

@section('content_header')
    <h1>Cadastro de Movimentação</h1>
@stop

@section('content')

    {{-- Formulário funcionário --}}
    <form action="{{ route('movimentacoes.store') }}" method="post" enctype="multipart/form-data">
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
