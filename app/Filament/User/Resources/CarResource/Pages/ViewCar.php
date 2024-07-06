<?php

namespace App\Filament\User\Resources\CarResource\Pages;

use App\Filament\User\Resources\CarResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Malzariey\FilamentDaterangepickerFilter\Fields\DateRangePicker;

class ViewCar extends ViewRecord
{
    protected static string $resource = CarResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\EditAction::make(),
            Actions\Action::make('Order')

        ];
    }
}
