@extends('adminlte::page')

@section('title', 'Movimentações')

@section('content_header')
    <h1>Movimentações</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Painel</h3>
        </div>
        <div class="card-body">

            {{-- Botão novo funcionário --}}
            <div class="col-md-12 text-left">
                <a href="{{ route('movimentacoes.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus">
                    </i> Nova movimentação</a>
            </div><br>

            <table class="table table-striped table-sm" id="movimentacoes">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Id</th>
                        <th scope="col" width="10%">Tipo</th>
                        <th scope="col" width="15%">Valor</th>
                        <th scope="col" width="25%">Funcionário</th>
                        <th scope="col" width="20%">Dt. Criação</th>
                        <th scope="col" width="15%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movimentacoes as $movimentacao)
                        <tr>
                            {{-- Id --}}
                            <td>{{ $movimentacao->id }}</td>

                            {{-- Tipo --}}
                            <td>{{ $movimentacao->tipo_movimentacao }}</td>

                            {{-- Valor --}}
                            <td>R$ {{ number_format($movimentacao->valor, 2, ',', '.') }}</td>

                            {{-- Funcionário --}}
                            <td>
                                @if ($movimentacao->funcionario)
                                    {{ $movimentacao->funcionario->nome_completo }}
                                @endif
                            </td>
                            {{-- Data de criação --}}
                            <td>{{ $movimentacao->data_criacao->format('d/m/Y H:i') }}</td>

                            <td>
                                {{-- Botão Mostrar --}}
                                <a class="btn btn-sm btn-primary text-white"
                                    href="{{ route('movimentacoes.show', $movimentacao->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Detalhes"><i class="fas fa-eye"></i></a>

                                {{-- Botão Editar --}}
                                <a class="btn btn-sm btn-warning text-white"
                                    href="{{ route('movimentacoes.edit', $movimentacao->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Editar"><i class="far fa-edit"></i></a>

                                {{-- Botão Deletar --}}
                                <form action="{{ route('movimentacoes.destroy', $movimentacao->id) }}"
                                    class="d-inline formulario-deleta" method="post" enctype="multipart/form-data"
                                    data-toggle="tooltip" data-placement="top" title="Excluir">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger text-white" type="submit"><i
                                            class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">
@stop

@section('js')

    {{-- ALERTAS --}}
    @include('admin.alerts.alerts')

    {{-- EXCLUIR --}}
    @include('admin.components.destroy',['formulario'=>'.formulario-deleta'])

    {{-- DATATABLES --}}
    @include('admin.components.tables',['tabela'=>'movimentacoes'])

    {{-- TOOLTIP --}}
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
@stop
