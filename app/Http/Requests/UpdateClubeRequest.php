<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClubeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'divisao' => 'required|string|max:50',
            'uniao' => 'required|string|max:50',
            'associacao' => 'required|string|max:50',
            'area' => 'required|integer',
            'regiao' => 'required|integer',
            'distrito' => 'nullable|string|max:50',
            'igreja' => 'nullable|string|max:100',
            'nome' => 'required|string|max:100',
            'status' => 'required|boolean',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'divisao.required' => 'O campo divisao é obrigatório.',
            'divisao.string' => 'O campo divisao deve ser uma string.',
            'divisao.max' => 'O campo divisao deve ter no máximo 50 caracteres.',
            'uniao.required' => 'O campo uniao é obrigatório.',
            'uniao.string' => 'O campo uniao deve ser uma string.',
            'uniao.max' => 'O campo uniao deve ter no máximo 50 caracteres.',
            'associacao.required' => 'O campo associacao é obrigatório.',
            'associacao.string' => 'O campo associacao deve ser uma string.',
            'associacao.max' => 'O campo associacao deve ter no máximo 50 caracteres.',
            'area.required' => 'O campo area é obrigatório.',
            'area.integer' => 'O campo area deve ser um número inteiro.',
            'regiao.required' => 'O campo regiao é obrigatório.',
            'regiao.integer' => 'O campo regiao deve ser um número inteiro.',
            'distrito.string' => 'O campo distrito deve ser uma string.',
            'distrito.max' => 'O campo distrito deve ter no máximo 50 caracteres.',
            'igreja.string' => 'O campo igreja deve ser uma string.',
            'igreja.max' => 'O campo igreja deve ter no máximo 100 caracteres.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres.',
            'status.required' => 'O campo status é obrigatório.',
            'status.boolean' => 'O campo status deve ser um booleano.',
        ];
    }
}
