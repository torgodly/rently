<?php

namespace App\Filament\User\Resources\CarResource\Pages;

use App\Filament\User\Resources\CarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;
}
