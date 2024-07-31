<?php

use App\Models\Car;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//terms and conditions
Route::get('/terms', function () {
    return view('terms');
});
//test car UnavailableDates
Route::get('/car-unavailable-dates', function () {
    $carReference = Car::find(1);
    dd($carReference->unavailableDates);
});


//message create post
use Illuminate\Support\Facades\Validator;

Route::post('/message/create', function () {
    $validator = Validator::make(request()->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect(url()->previous() . '#contact')
            ->withErrors($validator)
            ->withInput();
    }

    Message::create($validator->validated());

    return redirect(url()->previous() . '#contact')->with('success', __('Your message has been sent successfully!'));
})->name('message.create');

//my profile
Route::get('/profile', function () {
    return redirect('user/my-profile');
})->name('profile');
