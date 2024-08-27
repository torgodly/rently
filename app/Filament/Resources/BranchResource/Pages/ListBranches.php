<?php

namespace App\Filament\Resources\BranchResource\Pages;

use App\Filament\Resources\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBranches extends ListRecords
{
    protected static string $resource = BranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modelLabel(__('Branch'))
                ->requiresConfirmation(true)
                ->createAnother(false)
                ->modalWidth('2xl')
                ->icon('heroicon-o-plus-circle')
                ->modalIcon('heroicon-o-building-office')
                ->modalDescription(__('Please Fill In All Required Fields Correctly'))
        ];
    }
}
