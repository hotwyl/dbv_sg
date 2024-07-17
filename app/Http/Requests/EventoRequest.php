<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:255',
            'valor' => 'required|integer',
            'tipo_item' => 'required|in:clube,unidade,individual',
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
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres.',
            'descricao.string' => 'O campo descricao deve ser uma string.',
            'descricao.max' => 'O campo descricao deve ter no máximo 255 caracteres.',
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.integer' => 'O campo valor deve ser um número inteiro.',
            'tipo_item.required' => 'O campo tipo_item é obrigatório.',
            'tipo_item.in' => 'O campo tipo_item deve ser um dos valores: clube, unidade, individual.',
            'status.required' => 'O campo status é obrigatório.',
            'status.boolean' => 'O campo status deve ser um booleano.',
        ];
    }
}
