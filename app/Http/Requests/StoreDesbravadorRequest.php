<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesbravadorRequest extends FormRequest
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
            'id_unidade' => 'required|exists:unidade,id_unidade',
            'nome' => 'required|string|max:100',
            'id_cargo' => 'required|exists:cargo_funcao,id_cargo',
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
            'id_unidade.required' => 'O campo id_unidade é obrigatório.',
            'id_unidade.exists' => 'O campo id_unidade deve ser um id de unidade válido.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres.',
            'id_cargo.required' => 'O campo id_cargo é obrigatório.',
            'id_cargo.exists' => 'O campo id_cargo deve ser um id de cargo válido.',
            'status.required' => 'O campo status é obrigatório.',
            'status.boolean' => 'O campo status deve ser um booleano.',
        ];
    }
}
