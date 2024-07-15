<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $table = 'atividades';
    protected $primaryKey = 'id_atividade';
    protected $fillable = ['nome', 'descricao', 'valor', 'status'];
}
