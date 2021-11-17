@extends('adminlte::page')

@section('title', 'Movimentação')

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
                            {{ $movimentacao->id }}</span></p>

                    {{-- Tipo de movimentação --}}
                    <p><strong>Tipo de movimentação:</strong> <span class="text-muted">
                            {{ $movimentacao->tipo_movimentacao }}</span></p>

                    {{-- Valor --}}
                    <p><strong>Valor:</strong> <span class="text-muted">
                        {{ number_format($movimentacao->valor, 2, ',', '.') }}</span></p>

                    {{-- Observação --}}
                    <p><strong>Observação:</strong> <span class="text-muted">{{ $movimentacao->observacao }}</span></p>

                    {{-- Funcionário --}}
                    @if($movimentacao->funcionario)
                        <p><strong>Nome do Funcionário:</strong> <span class="text-muted">
                            {{ $movimentacao->funcionario->nome_completo }}</span></p>
                    @endif

                    {{-- Administrador --}}
                    <p><strong>Nome do administrador:</strong> <span class="text-muted">
                            {{ $movimentacao->administrador->nome_completo }}</span></p>

                    {{-- Criação --}}
                    <p><strong>Criação:</strong> <span class="text-muted">
                            {{ $movimentacao->data_criacao->format('d/m/Y H:i:s') }}</span></p>

                </div>

                {{-- Botão voltar --}}
                <div class="card-footer">
                    <a href="{{ route('movimentacoes.index') }}" class="btn btn-sm btn-primary"><i
                            class="fas fa-undo-alt"></i> Voltar</a>
                </div>
            </div>
        </div>
    </div>
@stop
