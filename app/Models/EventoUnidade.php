<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoUnidade extends Model
{
    use HasFactory;

    protected $table = 'eventos_unidades';
    protected $primaryKey = 'id_evento_unidade';
    protected $fillable = ['id_avaliacao', 'id_avaliador', 'id_unidade', 'acertos', 'erros', 'duracao', 'pontuacao', 'data_hora'];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'id_avaliacao', 'id_avaliacao');
    }

    public function avaliador()
    {
        return $this->belongsTo(Avaliador::class, 'id_avaliador', 'id_avaliador');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'id_unidade', 'id_unidade');
    }
}
