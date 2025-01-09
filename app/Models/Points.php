<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $fillable = ['name', 'latitude', 'longitude', 'variables'];

    protected $casts = [
        'variables' => 'array',
    ];
}

