<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AfiliadoFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255|unique:afiliados,nome',
            'email' => 'required|email|max:255|unique:afiliados,email',
            'porcentagem_ganho' => 'required|numeric|min:0|max:10',
            'desconto_usuario' => 'required|numeric|min:0|max:10',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.unique' => 'O nome já está em uso. Por favor, escolha outro.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Por favor, forneça um email válido.',
            'email.unique' => 'O email já está em uso. Por favor, forneça um email diferente.',
            'porcentagem_ganho.max' => 'A porcentagem de ganho não pode ser maior que 10%.',
            'porcentagem_ganho.min' => 'A porcentagem de ganho deve ser no mínimo 0%.',
            'desconto_usuario.max' => 'O desconto para o usuário não pode ser maior que 10%.',
            'desconto_usuario.min' => 'O desconto para o usuário deve ser no mínimo 0%.',
        ];
    }
}
