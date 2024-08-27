<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Login;
use App\Filament\Auth\Register;
use App\Filament\Widgets\StatsOverview;
use App\Livewire\MyCustomComponent;
use App\Livewire\MyCustomPersonalInfoProfileComponent;
use App\Livewire\MyCustomProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->renderHook(PanelsRenderHook::BODY_START,
                fn() => view('filament.user.identity-missing'))
            ->renderHook(PanelsRenderHook::USER_MENU_BEFORE,
                fn() => view('filament.user.balance'))
            ->id('user')
            ->path('user')
            ->login(Login::class)
            ->emailVerification()
            ->passwordReset()
            ->registration(Register::class)
            ->plugin(BreezyCore::make()
                ->withoutMyProfileComponents([
                    'personal_info'
                ])
                ->myProfileComponents([MyCustomProfile::class, MyCustomPersonalInfoProfileComponent::class])
                ->myProfile(
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                    hasAvatars: true, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                )->enableTwoFactorAuthentication())
            ->colors([
                'primary' => '#20c997',
                'gray' => Color::Gray,
                'blue' => Color::Blue,
                'yellow' => Color::Yellow,
                'red' => Color::Red,
                'green' => Color::Green,
                'orange' => Color::Orange,
                'purple' => Color::Purple,
                'cyan' => Color::Cyan,
                'teal' => Color::Teal,
                'lime'  => Color::Lime,
            ])
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('2.4rem')
            ->discoverResources(in: app_path('Filament/User/Resources'), for: 'App\\Filament\\User\\Resources')
            ->discoverPages(in: app_path('Filament/User/Pages'), for: 'App\\Filament\\User\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->discoverWidgets(in: app_path('Filament/User/Widgets'), for: 'App\\Filament\\User\\Widgets')
            ->widgets([
                StatsOverview::class
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
