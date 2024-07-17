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
            'id_atividade' => 'required|exists:atividades,id_atividade',
            'id_avaliador' => 'required|exists:avaliadores,id_avaliador',
            'id_clube' => 'required|exists:clubes,id_clube',
            'pontuacao' => 'required|integer',
            'data_hora' => 'nullable|date',
        ];
    }
}
