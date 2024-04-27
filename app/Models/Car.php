<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'manufacturing_year',
        'color',
        'license_plate',
        'mileage',
        'transmission_type',
        'fuel_type',
        'price_per_day',
        'available',
        'branch_id',
        'description',
    ];

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
