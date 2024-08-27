<?php

namespace App\Http\Controllers\Auth;

use App\Filament\Auth\CustomLoginResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): ?LoginResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->active == 0) {
            Filament::auth()->logout();
            $this->throwInactiveAccountException();
        }

        if ($user->isManager()) {
            //you dont have breanch
            if (!$user->branch()->exists()) {
                Filament::auth()->logout();
                $this->throwYouDontHaveBranchException();
            }


            if ($user->branch->status == 0) {
                Filament::auth()->logout();
                $this->throwInactiveBranchException();
            }
        }
        return app(CustomLoginResponse::class);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function throwInactiveAccountException(): never
    {
        throw ValidationException::withMessages([
            'email' => __('Your account is inactive, please contact the admin'),
        ]);
    }

    //throwInactiveBranchException

    private function throwYouDontHaveBranchException()
    {
        throw ValidationException::withMessages([
            'email' => __('You dont have branch, please contact the admin'),
        ]);
    }

    protected function throwInactiveBranchException(): never
    {
        throw ValidationException::withMessages([
            'email' => __('Your branch is inactive, please contact the admin'),
        ]);
    }
}
