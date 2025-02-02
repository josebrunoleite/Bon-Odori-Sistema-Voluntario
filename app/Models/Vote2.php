<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote2 extends Model
{
    use HasFactory;
    public $fillable = ['user_code', 'rissa', 'aecio', 'jhon', 'ip_address'];
}
