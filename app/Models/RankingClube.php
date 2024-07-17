<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingClube extends Model
{
    use HasFactory;

    protected $table = 'ranking_clubes';
    protected $primaryKey = 'id_ranking_clube';
    protected $fillable = ['id_avaliacao', 'id_avaliador', 'id_clube', 'pontuacao', 'data_hora'];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'id_avaliacao', 'id_avaliacao');
    }

    public function avaliador()
    {
        return $this->belongsTo(Avaliador::class, 'id_avaliador', 'id_avaliador');
    }

    public function clube()
    {
        return $this->belongsTo(Clube::class, 'id_clube', 'id_clube');
    }
}
