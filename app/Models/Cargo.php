<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';
    protected $primaryKey = 'id_cargo';
    protected $fillable = ['nome', 'status'];

    public function desbravadores()
    {
        return $this->hasMany(Desbravador::class, 'id_cargo');
    }
}
