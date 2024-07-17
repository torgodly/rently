<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//terms and conditions
Route::get('/terms', function () {
    return view('terms');
});
//test car UnavailableDates
Route::get('/car-unavailable-dates', function () {
    $carReference = Car::find(1);
    dd($carReference->unavailableDates);
});
