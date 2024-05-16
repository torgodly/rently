<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
        'long',
        'lat',
    ];


    //url google map
    public function getUrlAttribute()
    {
        return 'https://www.google.com/maps/search/?api=1&query=' . $this->lat . ',' . $this->long;
    }
}
