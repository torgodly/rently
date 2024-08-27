<?php

namespace App\Filament\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Validation\ValidationException;

class Login extends BaseAuth
{
    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/login.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/login.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/login.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        if (!Filament::auth()->attempt($this->getCredentialsFromFormData($data), $data['remember'] ?? false)) {
            $this->throwFailureValidationException();
        }

        $user = Filament::auth()->user();
//
//        if (
//            ($user instanceof FilamentUser) &&
//            (!$user->canAccessPanel(Filament::getCurrentPanel()))
//        ) {
//            Filament::auth()->logout();
//
//            $this->throwFailureValidationException();
//        }
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


        session()->regenerate();

        return app(CustomLoginResponse::class);
    }

    protected function throwInactiveAccountException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => __('Your account is inactive, please contact the admin'),
        ]);
    }

    //throwInactiveBranchException

    private function throwYouDontHaveBranchException()
    {
        throw ValidationException::withMessages([
            'data.email' => __('You dont have branch, please contact the admin'),
        ]);
    }

    protected function throwInactiveBranchException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => __('Your branch is inactive, please contact the admin'),
        ]);
    }
}
