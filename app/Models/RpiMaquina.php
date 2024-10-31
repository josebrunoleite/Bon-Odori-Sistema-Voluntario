<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpiMaquina extends Model
{
    protected $fillable = [
        "id",
        "nome",
        "localizacao",
        "created_at",
    ];

    public function rpiMaquinaDado()
    {
        return $this->hasMany(RpiMaquinaDado::class, 'maquina_id');
    }
}
