<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desbravador extends Model
{
    use HasFactory;

    protected $table = 'desbravadores';
    protected $primaryKey = 'id';
    protected $fillable = ['id_unidade', 'nome', 'id_cargo', 'status'];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'id_unidade');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }
}
