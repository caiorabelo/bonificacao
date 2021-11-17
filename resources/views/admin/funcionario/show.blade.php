@extends('adminlte::page')

@section('title', 'Funcionário')

@section('content_header')
    <h1>Detalhes</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Painel</h3>
                </div>
                <div class="card-body">

                    {{-- Id --}}
                    <p><strong>Id:</strong> <span class="text-muted">
                            {{ $funcionario->id }}</span></p>

                    {{-- Nome completo --}}
                    <p><strong>Nome completo:</strong> <span class="text-muted">
                            {{ $funcionario->nome_completo }}</span></p>

                    {{-- Login --}}
                    <p><strong>Login:</strong> <span class="text-muted">{{ $funcionario->login }}</span></p>

                    {{-- Senha --}}
                    <p><strong>Senha:</strong> <span class="text-muted">********</span></p>

                    {{-- Saldo atual --}}
                    <p><strong>Saldo atual:</strong> <span class="text-muted">
                            {{ number_format($funcionario->saldo_atual, 2, ',', '.') }}</span></p>

                    {{-- Administrador --}}
                    <p><strong>Nome do administrador:</strong> <span class="text-muted">
                            {{ $funcionario->administrador->nome_completo }}</span></p>

                    {{-- Criação --}}
                    <p><strong>Criação:</strong> <span class="text-muted">
                            {{ $funcionario->data_criacao->format('d/m/Y H:i:s') }}</span></p>

                    {{-- Alteração --}}
                    <p><strong>Última alteração:</strong> <span class="text-muted">
                            {{ $funcionario->data_alteracao->format('d/m/Y H:i:s') }}</span></p>

                </div>

                {{-- Botão voltar --}}
                <div class="card-footer">
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-sm btn-primary"><i
                            class="fas fa-undo-alt"></i> Voltar</a>
                </div>
            </div>
        </div>
    </div>
@stop
