<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoRequest extends FormRequest
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
            'categoria' => 'required|in:ranking,evento,desafio',
            'tipo_item' => 'required|in:clube,unidade,desbravador',
            'valor' => 'required|integer',
            'status' => 'required|boolean',
        ];
    }
}
