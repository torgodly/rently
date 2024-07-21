<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Actions\Contracts\HasActions;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class IdentityVerification extends Page implements HasTable, HasActions
{
    use InteractsWithTable;
    use InteractsWithActions;
    use InteractsWithRecord;

    protected static ?string $navigationIcon = 'tabler-id';

    protected static string $view = 'filament.pages.identity-verification';
    protected static ?int $navigationSort = 1000;

    public static function getNavigationLabel(): string
    {
        return __('Identity Verification');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('User Management');
    }

    public function getHeading(): string
    {
        return __('Identity Verification');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->needVerification())
            ->columns([
                TextColumn::make('name')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('passport')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
            ])
            ->actions([
                Action::make('verify')
                    ->label('Verify')
                    ->translateLabel()
                    ->color('success')
                    ->requiresConfirmation()
                    ->infolist([
                        Grid::make()->schema([
                            ImageEntry::make('avatar_url')
                                ->label('Avatar')
                                ->translateLabel()
                                ->circular(),
                            TextEntry::make('name')
                                ->label('Name')
                                ->translateLabel(),
                            TextEntry::make('email')
                                ->label('Email')
                                ->translateLabel(),
                            TextEntry::make('phone')
                                ->label('Phone')
                                ->translateLabel(),
                        ])

                    ])
                    ->modalContentFooter(fn($record) => view('passport', ['passport' => $record->passport]))
                    ->modalDescription(__('Are you sure you want to verify this user?'))
                    ->modalIcon('heroicon-o-check-circle')
                    ->modalIconColor('green')
                    ->modalWidth(MaxWidth::TwoExtraLarge)
                    ->action(function ($record) {
                        $record->verify();
                    }),

                Action::make('decline')
                    ->label('Decline')
                    ->translateLabel()
                    ->color('danger')
                    ->requiresConfirmation()
                    ->infolist([
                        Grid::make()->schema([
                            ImageEntry::make('avatar_url')
                                ->label('Avatar')
                                ->translateLabel()
                                ->circular(),
                            TextEntry::make('name')
                                ->label('Name')
                                ->translateLabel(),
                            TextEntry::make('email')
                                ->label('Email')
                                ->translateLabel(),
                            TextEntry::make('phone')
                                ->label('Phone')
                                ->translateLabel(),
                        ])

                    ])
                    ->modalContentFooter(fn($record) => view('passport', ['passport' => $record->passport]))
                    ->modalDescription(__('Are you sure you want to decline this user?'))
                    ->modalIcon('heroicon-o-x-circle')
                    ->modalIconColor('red')
                    ->modalWidth(MaxWidth::TwoExtraLarge)
                    ->action(function ($record) {
                        $record->decline();
                    }),


            ]);
    }

}
