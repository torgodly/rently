<?php

namespace App\Filament\Office\Resources\OrderResource\Pages;

use App\Filament\Office\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
