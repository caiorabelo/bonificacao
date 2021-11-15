<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Mosta a listagem de funcionários.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();

        return view(
            'view',
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
        return view('view');
    }

    /**
     * Cadastra um novo funcionário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = $request->all();

        if (!$funcionario) {
            return redirect()->back();
        }

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
            'view',
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

        return view(
            'view',
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
    public function update(Request $request, $id)
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
        $funcionario->update([
            $request->all(),
        ]);

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
}
