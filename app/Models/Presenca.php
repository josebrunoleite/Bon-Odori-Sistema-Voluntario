<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;



class Presenca extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'data_registro',
        'codigoInserido',
        'subsetor1',
        'subsetor2',
        'entrada',
        'saida'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
