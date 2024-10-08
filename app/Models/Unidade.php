<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidades';
    protected $primaryKey = 'id_unidade';
    protected $fillable = ['id_clube', 'nome', 'status'];

    public function clube()
    {
        return $this->belongsTo(Clube::class, 'id_clube');
    }

    public function desbravadores()
    {
        return $this->hasMany(Desbravador::class, 'id_unidade');
    }

    public function rankingUnidades()
    {
        return $this->hasMany(RankingUnidade::class, 'id_unidade');
    }
}
