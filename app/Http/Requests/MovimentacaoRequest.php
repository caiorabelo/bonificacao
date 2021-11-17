<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentacaoRequest extends FormRequest
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
            'tipo_movimentacao' =>'required',
            'valor' =>'required',
            'funcionario_id' =>'required',
        ];
    }

    public function messages(){
        return[
            'tipo_movimentacao.required'=>'É obrigatório informar o tipo;',
            'valor.required'=>'É obrigatório informar o valor;',
            'funcionario_id.required'=>'É obrigatório selecionar um funcionário;',
        ];
    }
}
