<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Painel</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        @csrf
        <div class="row">

            {{-- campo nome completo --}}
            <div class="col-md-5">
                <div class="form-group">
                    <label for="nome_completo">Nome Completo</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nome Completo" name="nome_completo"
                            id="nome_completo" autocomplete="off"
                            value="{{ $funcionario->nome_completo ?? old('nome_completo') }}">
                    </div>
                </div>
            </div>

            {{-- Campo saldo atual --}}
            <div class="col-md-2">
                <div class="form-group">
                    <label for="saldo_atual">Saldo atual</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            onKeyUp="formataNumero(this, event, '###.###.###,##', true)" placeholder="Saldo atual"
                            name="saldo_atual" id="saldo_atual" autocomplete="off"
                            value="{{ $funcionario->saldo_atual ?? old('saldo_atual') }}">
                    </div>
                </div>
            </div>

            {{-- Campo login --}}
            <div class="col-md-3">
                <div class="form-group">
                    <label for="login">Login</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Login" name="login" id="login"
                            autocomplete="off" value="{{ $funcionario->login ?? old('login') }}">
                    </div>
                </div>
            </div>

            {{-- Campo senha --}}
            <div class="col-md-2">
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha"
                            autocomplete="off" value="{{ $funcionario->senha ?? old('senha') }}">
                    </div>
                </div>
            </div>

            {{-- Campo oculto administrador_id --}}
            <input type="hidden" name="administrador_id" value="{{ Auth::user()->id }}">
        </div>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">

        {{-- Botão voltar --}}
        <div style="display: flex; justify-content:right">
            <a href="{{ route('funcionarios.index') }}" class="btn btn-sm btn-primary mr-1">
                <i class="fas fa-undo-alt"></i> Voltar</a>

            {{-- Botão Salvar --}}
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fas fa-plus"></i> Salvar</button>

        </div>
    </div>
</div>
