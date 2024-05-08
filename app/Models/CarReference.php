<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarReference extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'body_style'
    ];
}
