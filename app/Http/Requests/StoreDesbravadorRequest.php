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
}
