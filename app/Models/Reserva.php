<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reserva extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'data_registro',
        'options',
        'days',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}