<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modelLabel(__('User'))
                ->requiresConfirmation(true)
                ->createAnother(false)
                ->modalWidth('2xl')
                ->icon('heroicon-o-plus-circle')
                ->modalIcon('heroicon-o-users')
                ->modalDescription(__('Please Fill In All Required Fields Correctly'))
        ];
    }
}
