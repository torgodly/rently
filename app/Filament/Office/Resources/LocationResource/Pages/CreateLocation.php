<?php

namespace App\Filament\Office\Resources\LocationResource\Pages;

use App\Filament\Office\Resources\LocationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLocation extends CreateRecord
{
    protected static string $resource = LocationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['location']);

        $data['branch_id'] = auth()->user()->branch->id;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

}
