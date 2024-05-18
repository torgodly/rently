<?php

namespace App\Filament\Office\Resources\OrderResource\Pages;

use App\Filament\Office\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\EditAction::make(),
            Actions\Action::make('Accept')
        ];
    }
}
