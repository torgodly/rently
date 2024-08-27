<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Login;
use App\Filament\Widgets\BranchReportChart;
use App\Filament\Widgets\StatsOverview;
use App\Livewire\MyCustomPersonalInfoProfileComponent;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class OfficePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->renderHook(
                PanelsRenderHook::SIDEBAR_NAV_START,
                fn() => view('branches.sidebar-nav-start')
            )
            ->id('office')
            ->path('office')
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
                'lime' => Color::Lime,
            ])
            ->plugin(BreezyCore::make()
                ->withoutMyProfileComponents([
                    'personal_info'
                ])
                ->myProfileComponents([MyCustomPersonalInfoProfileComponent::class])
                ->myProfile(
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                    hasAvatars: true, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                )->enableTwoFactorAuthentication())
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('2.4rem')
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('2.4rem')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login(Login::class)
            ->passwordReset()
            ->discoverResources(in: app_path('Filament/Office/Resources'), for: 'App\\Filament\\Office\\Resources')
            ->discoverPages(in: app_path('Filament/Office/Pages'), for: 'App\\Filament\\Office\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Office/Widgets'), for: 'App\\Filament\\Office\\Widgets')
            ->widgets([
                StatsOverview::class,

                BranchReportChart::class
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
