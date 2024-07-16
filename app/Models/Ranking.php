<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'ranking';
    protected $primaryKey = 'id_ranking';
    protected $fillable = ['nome', 'descricao', 'valor', 'status'];
}
