<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'make',
        'model',
        'manufacturing_year',
        'color',
        'license_plate',
        'mileage',
        'mileage_to_service',
        'transmission_type',
        'fuel_type',
        'price_per_day',
        'available',
        'branch_id',
        'description',
        'seats'
    ];

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    //hero
    protected function getHeroAttribute(): string
    {
        return $this->getFirstMediaUrl('car_images');
    }
}
