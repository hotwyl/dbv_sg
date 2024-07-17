<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliador extends Model
{
    use HasFactory;

    protected $table = 'avaliadores';
    protected $primaryKey = 'id_avaliador';
    protected $fillable = ['nome', 'descricao', 'status'];

    public function avaliacoes()
    {
        return $this->belongsToMany(Avaliacao::class, 'avaliadores_avaliacoes', 'id_avaliador', 'id_avaliacao');
    }
}
