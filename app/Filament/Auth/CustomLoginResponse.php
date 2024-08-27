<?php

namespace App\Filament\Auth;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\LoginResponse;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class CustomLoginResponse extends LoginResponse
{

    public function toResponse($request): RedirectResponse|Redirector
    {
        if (Filament::auth()->user()->isManager()) {
            return redirect('/office');
        }

        if (Filament::auth()->user()->isAdmin()) {
            return redirect('/admin');
        }

        if (Filament::auth()->user()->isUser()) {
            return redirect('/user');
        }
        return redirect('/login');
//        return redirect()->intended(Filament::getUrl());
    }

}
