<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_completo' =>'required',
            'login' =>'required',
            'senha' =>'required | min:6',
            'saldo_atual' =>'required',
        ];
    }

    public function messages(){
        return[
            'nome_completo.required'=>'É obrigatório informar o nome;',
            'login.required'=>'É obrigatório informar o login;',
            'senha.required'=>'É obrigatório informar a senha;',
            'senha.required'=>'É obrigatório informar a senha;',
            'saldo_atual.required'=>'É obrigatório informar o saldo atual',
        ];
    }
}
