<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Panel;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar', 'en']); // also accepts a closure
        });


        Table::configureUsing(function (Table $table): void {
            $table->defaultSort('id', 'desc');
        });
        Panel::configureUsing(function (Panel $panel) {
            dd($panel);
        });


    }
}
