<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentacaoRequest;
use App\Models\Funcionario;
use App\Models\Movimentacao;

class MovimentacaoController extends Controller
{
    /**
     * Mostra a listagem de movimentações.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimentacoes = Movimentacao::all();

        return view(
            'admin.movimentacao.index',
            [
                'movimentacoes' => $movimentacoes
            ]
        );
    }

    /**
     * Mostra o formulário para criar uma nova movimentação.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::all();

        return view(
            'admin.movimentacao.create',
            [
                'funcionarios' => $funcionarios,
            ]
        );
    }

    /**
     * Cadastra uma nova movimentação.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovimentacaoRequest $request)
    {
        $movimentacao = $request->all();

        if (!$movimentacao) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'A movimentação não pode ser finalizada'
                );
        }

        // CONVERTE PARA FORMATO AMERICADO
        $movimentacao['valor']
        =str_replace(".", "", $movimentacao['valor']);
        $movimentacao['valor']
        =str_replace(",", ".", $movimentacao['valor']);

        Movimentacao::create($movimentacao);

        return redirect()
            ->back()
            ->with(
                'success',
                'Movimentação cadastrada com sucesso!'
            );
    }

    /**
     * Mostra uma movimentação específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimentacao = Movimentacao::find($id);

        if (!$movimentacao) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Movimentação não encontrada!'
                );
        }

        return view(
            'admin.movimentacao.show',
            [
                'movimentacao' => $movimentacao,
            ]
        );
    }

    /**
     * Mostra o formulário para editar uma movimentação específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimentacao = Movimentacao::find($id);

        if (!$movimentacao) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Movimentação não encontrada!'
                );
        }

        //CONVERTE PARA FORMATO BRASILEIRO
        $movimentacao['valor']
        =number_format($movimentacao['valor'], 2, ',', '.');

        $funcionarios = Funcionario::all();

        return view(
            'admin.movimentacao.edit',
            [
                'movimentacao' => $movimentacao,
                'funcionarios' => $funcionarios,
            ]
        );
    }

    /**
     * Altera uma movimentação específico..
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovimentacaoRequest $request, $id)
    {
        $movimentacao = Movimentacao::find($id);

        if (!$movimentacao) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Movimentação não encontrada!'
                );
        }

        $movimentacao_request = $request->all();

        // CONVERTE PARA FORMATO AMERICADO
        $movimentacao_request['valor']
        =str_replace(".", "", $movimentacao_request['valor']);
        $movimentacao_request['valor']
        =str_replace(",", ".", $movimentacao_request['valor']);

        $movimentacao->update($movimentacao_request);

        return redirect()
            ->back()
            ->with(
                'success',
                'Movimentação alterada com sucesso!'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimentacao = Movimentacao::find($id);

        if (!$movimentacao) {
            return redirect()
                ->back()
                ->with(
                    'success',
                    'Movimentação não encontrada!'
                );
        }

        $movimentacao->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Movimentação deletada com sucesso!'
            );
    }
}
