<?php

namespace App\Filament\User\Resources\OrderResource\Pages;

use App\Filament\User\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
