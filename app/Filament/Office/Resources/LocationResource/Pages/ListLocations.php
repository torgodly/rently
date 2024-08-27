<?php

namespace App\Filament\Office\Resources\LocationResource\Pages;

use App\Filament\Office\Resources\LocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLocations extends ListRecords
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->translateLabel()->label(__('Create Location')),
        ];
    }
}
