<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePessoaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|string',
            'dataNasc' => 'required',
            'sexo' => 'required',
        ];
    }

    // Função com o objetivo de traduzir as mensagens
    public function messages()
    {
        return [
            'required' => 'O :attribute é obrigatório!',
            'nome.string' => 'O campo NOME só pode ter texto.',
        ];
    }
}
