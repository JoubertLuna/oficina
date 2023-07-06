<?php

namespace App\Http\Requests\Oficina\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $url = $this->segment(2);

        return [
            'nome' => "required|min:3|max:255|string|unique:suppliers,nome,{$url},url",
            'nome_fantasia' => 'nullable|min:3|max:255|string',
            'email' => "required|email|max:255|string|unique:suppliers,email,{$url},url",
            'cpf' => "nullable|min:14|max:14|cpf|formato_cpf|unique:suppliers,cpf,{$url},url",
            'cnpj' => "nullable|min:18|max:18|cnpj|formato_cnpj|unique:suppliers,cnpj,{$url},url",
            'rg' => "nullable|min:9|max:10|unique:suppliers,rg,{$url},url",
            'fone' => 'nullable|min:14|max:14|celular_com_ddd|',
            'celular' => 'nullable|min:15|max:15|celular_com_ddd|',
            'cep' => 'nullable|min:9|max:10|',
            'logradouro' => 'nullable|max:200|',
            'numero' => 'nullable|numeric|',
            'uf' => 'nullable|min:2|max:2|uf|',
            'cidade' => 'nullable|max:200|',
            'complemento' => 'nullable|max:200|',
            'bairro' => 'nullable|max:200|',
            'ativo' => 'required', Rule::in(['1', '0']),
        ];
    }
}
