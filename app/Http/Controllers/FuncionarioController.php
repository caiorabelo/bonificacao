<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Funcionario;
use App\Models\Movimentacao;
use PDF;

class FuncionarioController extends Controller
{
    /**
     * Mostra a listagem de funcionários.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();

        return view(
            'admin.funcionario.index',
            [
                'funcionarios' => $funcionarios,
            ]
        );
    }

    /**
     * Mostra o formulário para criar um novo funcionário.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.funcionario.create');
    }

    /**
     * Cadastra um novo funcionário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        $funcionario = $request->all();

        if (!$funcionario) {
            return redirect()->back();
        }

        // CONVERTE PARA FORMATO AMERICADO
        $funcionario['saldo_atual']
            = str_replace(".", "", $funcionario['saldo_atual']);
        $funcionario['saldo_atual']
            = str_replace(",", ".", $funcionario['saldo_atual']);

        //SENHA CRIPTOGRAFADA
        $funcionario['senha'] = bcrypt($funcionario['senha']);

        Funcionario::create($funcionario);

        return redirect()
            ->back()
            ->with(
                'success',
                'Funcionário cadastrado com sucesso!'
            );
    }

    /**
     * Mostra um funcionário específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Funcionário não encontrado!'
                );
        }

        return view(
            'admin.funcionario.show',
            [
                'funcionario' => $funcionario,
            ]
        );
    }

    /**
     * Mostra o formulário para editar um funcionário específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Funcionário não encontrado!'
                );
        }

        //CONVERTE PARA FORMATO BRASILEIRO
        $funcionario['saldo_atual']
            = number_format($funcionario['saldo_atual'], 2, ',', '.');

        return view(
            'admin.funcionario.edit',
            [
                'funcionario' => $funcionario,
            ]
        );
    }

    /**
     * Altera um funcioário específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioRequest $request, $id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Funcionário não encontrado!'
                );
        }

        $funcionario_request = $request->all();

        // CONVERTE PARA FORMATO AMERICADO
        $funcionario_request['saldo_atual']
            = str_replace(".", "", $funcionario_request['saldo_atual']);
        $funcionario_request['saldo_atual']
            = str_replace(",", ".", $funcionario_request['saldo_atual']);

        //SENHA CRIPTOGRAFADA
        $funcionario_request['senha']
            = bcrypt($funcionario_request['senha']);

        $funcionario->update($funcionario_request);

        return redirect()
            ->back()
            ->with(
                'success',
                'Funcionário alterado com sucesso!'
            );
    }

    /**
     * Deleta um funcionário específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Funcionário não encontrado!'
                );
        }

        $funcionario->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Funcionário deletado com sucesso!'
            );
    }

    public function extrato($id)
    {
        $funcionario = Funcionario::find($id);
        $movimentacoes = Movimentacao::where('funcionario_id',$id)->get();

        $pdf = PDF::loadView(
            'admin.relatorio.extratoFuncionario',
            [
                'funcionario'=>$funcionario,
                'movimentacoes'=>$movimentacoes,
            ]
        );

        return $pdf->setPaper('a4')
        ->stream('Extrato.pdf');

    }
}
