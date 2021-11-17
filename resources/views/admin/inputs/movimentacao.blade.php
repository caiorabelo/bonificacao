<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Painel</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        @csrf
        <div class="row">

            {{-- Campo Tipo de movimentação --}}
            <div class="col-md-2">
                <div class="form-group">
                    <label for="tipo_movimentacao">Tipo</label>
                    <select class="form-control" name="tipo_movimentacao" id="tipo_movimentacao">
                        <option value="entrada" @if(@isset($movimentacao->tipo_movimentacao)
                        && $movimentacao->tipo_movimentacao=='entrada')
                            selected @endif>Entrada</option>
                        <option value="saída" @if(@isset($movimentacao->tipo_movimentacao)
                        && $movimentacao->tipo_movimentacao=='saída')
                            selected @endif>Saída</option>
                    </select>
                </div>
            </div>

            {{-- Campo valor --}}
            <div class="col-md-2">
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            onKeyUp="formataNumero(this, event, '###.###.###,##', true)" placeholder="Valor"
                            name="valor" id="valor" autocomplete="off"
                            value="{{ $movimentacao->valor ?? old('valor') }}">
                    </div>
                </div>
            </div>

            {{-- Campo funcionário --}}
            <div class="" id="col_funcionario">
                <div class="form-group">
                    <label for="funcionario_id">Funcionário</label><br>
                    <select class="form-control" name="funcionario_id" id="funcionario_id">
                        @foreach ($funcionarios as $funcionario)

                            @if (isset($movimentacao->funcionario->id))
                                    <option value="{{ $funcionario->id }}" @if ($funcionario->id == $movimentacao->funcionario->id)
                                        selected @endif @if ($funcionario->id == old('funcionario_id'))selected
                                @endif>
                                {{ $funcionario->nome_completo }}</option>
                            @else
                                <option value="{{ $funcionario->id }}">{{ $funcionario->nome_completo }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Campo observação --}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome_completo">Observação</label>
                    <textarea class="form-control" id="observacao" name="observacao" rows="3"
                        placeholder="Observação">{{ $movimentacao->observacao ?? old('observacao') }}</textarea>
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
            <a href="{{ route('movimentacoes.index') }}" class="btn btn-sm btn-primary mr-1">
                <i class="fas fa-undo-alt"></i> Voltar</a>

            {{-- Botão Salvar --}}
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fas fa-plus"></i> Salvar</button>

        </div>
    </div>
</div>
