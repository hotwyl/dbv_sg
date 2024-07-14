<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClubeRequest extends FormRequest
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
}
