<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpiMaquinaDado extends Model
{
    
    protected $fillable = [
    "maquina_id",
    "temperatura",
    "umidade",
    "ruido",
    ];

    public function rpiMaquina()
    {
        return $this->belongsTo(RpiMaquina::class);
    }
}
