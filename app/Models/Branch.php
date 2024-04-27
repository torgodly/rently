<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'country',
        'manager_id',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function cars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Car::class);
    }
}
