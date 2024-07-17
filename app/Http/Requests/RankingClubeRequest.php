<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RankingClubeRequest extends FormRequest
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
            'id_avaliacao' => 'required|exists:avaliacoes,id_avaliacao',
            'id_avaliador' => 'required|exists:avaliadores,id_avaliador',
            'id_clube' => 'required|exists:clubes,id_clube',
            'pontuacao' => 'required|integer|min:0|max:1000',
            'data_hora' => 'nullable|date',
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
            'id_avaliacao.required' => 'O campo id_avaliacao é obrigatório.',
            'id_avaliacao.exists' => 'O campo id_avaliacao deve ser um id de avaliação válido.',
            'id_avaliador.required' => 'O campo id_avaliador é obrigatório.',
            'id_avaliador.exists' => 'O campo id_avaliador deve ser um id de avaliador válido.',
            'id_clube.required' => 'O campo id_clube é obrigatório.',
            'id_clube.exists' => 'O campo id_clube deve ser um id de clube válido.',
            'pontuacao.required' => 'O campo pontuacao é obrigatório.',
            'pontuacao.integer' => 'O campo pontuacao deve ser um número inteiro.',
            'pontuacao.min' => 'O campo pontuacao deve ser no mínimo 0.',
            'pontuacao.max' => 'O campo pontuacao deve ser no máximo 1000.',
            'data_hora.date' => 'O campo data_hora deve ser uma data válida.',
        ];
    }
}
