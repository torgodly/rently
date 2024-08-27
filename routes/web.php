<?php

use App\Http\Controllers\ProfileController;
use App\Models\Car;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;



require __DIR__.'/auth.php';

Route::get('/', function () {
    $cars = Car::inRandomOrder()->take(8)->get();
    return view('welcome', compact('cars'));
})->name('welcome');

//terms and conditions
Route::get('/terms', function () {
    return view('terms');
});



Route::post('/message/create', function () {

    $validator = Validator::make(request()->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ]);


    Message::create($validator->validated());

    return redirect(url()->previous() . '#contact')->with('message', __('Your message has been sent successfully!'));
})->name('message.create');

//contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//my profile
Route::get('/profile', function () {
    return redirect('user/my-profile');
})->name('profile');


//route with guest middleware


//route test
Route::get('/car-show', function () {
    $cars = Car::all();
    return view('car-show', compact('cars'));
})->name('car-show');


Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions');
