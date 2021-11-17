<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-12 text-center fonte font-weight-bold" style="font-size: 18px">Extrato de Movimentações</div>
    </div>
    <div style="font-size: 14px" class="mt-5 font-weight-bold">
        Funcionário: {{ $funcionario->nome_completo }}
    </div>
    <table class="table table-striped table-sm mt-2" style="font-size: 12px">
        <thead>
            <tr style="font-size: 13px">
                <th scope="col">Dt. Movimentação</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col">Observação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimentacoes as $movimentacao)
                <tr>
                    {{-- Data de criação --}}
                    <td>{{ $movimentacao->data_criacao->format('d/m/Y H:i:s') }}</td>

                    {{-- Tipo --}}
                    <td>{{ $movimentacao->tipo_movimentacao }}</td>

                    {{-- Valor --}}
                    <td>R$ {{ number_format($movimentacao->valor, 2, ',', '.') }}</td>

                    {{-- Observação --}}
                    <td>
                        {{ $movimentacao->observacao }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
