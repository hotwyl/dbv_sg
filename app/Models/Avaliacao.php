<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'avaliacoes';
    protected $primaryKey = 'id_avaliacao';
    protected $fillable = ['nome', 'descricao', 'tipo', 'categoria', 'status'];

    public function itens()
    {
        return $this->hasMany(Item::class, 'id_avaliacao', 'id_avaliacao');
    }
}
