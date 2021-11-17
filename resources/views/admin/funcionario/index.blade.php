@extends('adminlte::page')

@section('title', 'Funcionário')

@section('content_header')
    <h1>Funcionários</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Painel</h3>
        </div>
        <div class="card-body">

            {{-- Botão novo funcionário --}}
            <div class="col-md-12 text-left">
                <a href="{{ route('funcionarios.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus">
                    </i> Novo funcionario</a>
            </div><br>

            <table class="table table-striped table-sm" id="funcionarios">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Id</th>
                        <th scope="col" width="33%">Nome completo</th>
                        <th scope="col" width="20%">Saldo atual</th>
                        <th scope="col" width="20%">Dt. Criação</th>
                        <th scope="col" width="17%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $funcionario)
                        <tr>
                            {{-- Id --}}
                            <td>{{ $funcionario->id }}</td>

                            {{-- Nome completo --}}
                            <td>{{ $funcionario->nome_completo }}</td>

                            {{-- Saldo Atual --}}
                            <td>R$ {{ number_format($funcionario->saldo_atual, 2, ',', '.') }}</td>

                            {{-- Data de criação --}}
                            <td>{{ $funcionario->data_criacao->format('d/m/Y H:i') }}</td>

                            <td>
                                {{-- Botão Detalhes --}}
                                <a class="btn btn-sm btn-primary text-white"
                                    href="{{ route('funcionarios.show', $funcionario->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Detalhes"><i class="fas fa-eye"></i></a>

                                {{-- Extrato --}}
                                <a class="btn btn-sm btn-secondary text-white"
                                    href="{{ route('funcionarios.extrato', $funcionario->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Extrato"><i class="fas fa-file-signature"></i></a>

                                {{-- Botão Editar --}}
                                <a class="btn btn-sm btn-warning text-white"
                                    href="{{ route('funcionarios.edit', $funcionario->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Editar"><i class="far fa-edit"></i></a>

                                {{-- Botão Deletar --}}
                                <form action="{{ route('funcionarios.destroy', $funcionario->id) }}"
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
    @include('admin.components.tables',['tabela'=>'funcionarios'])

    {{-- TOOLTIP --}}
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
