<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'pickup_date',
        'return_date',
        'longitude',
        'latitude',
        'order_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function getPriceAttribute()
    {
        $days = $this->pickup_date->diffInDays($this->return_date);
        return $days * $this->car->price_per_day;
    }


}
