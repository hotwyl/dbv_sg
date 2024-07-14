<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidades';
    protected $primaryKey = 'id';
    protected $fillable = ['id_clube', 'nome', 'status'];

    public function clube()
    {
        return $this->belongsTo(Clube::class, 'id_clube', 'id_clube');
    }

    public function desbravadores()
    {
        return $this->hasMany(Desbravador::class, 'id_unidade');
    }
}
