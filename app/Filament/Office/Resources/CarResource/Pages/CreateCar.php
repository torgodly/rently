<?php

namespace App\Filament\Office\Resources\CarResource\Pages;

use App\Filament\Office\Resources\CarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['branch_id'] = auth()->user()->branch->id;
        return $data;
    }
}
