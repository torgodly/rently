<?php

namespace App\Filament\Office\Resources\CarResource\Pages;

use App\Filament\Office\Resources\CarResource;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewCar extends ViewRecord
{
    protected static string $resource = CarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('Add Discount')
                ->label('Add Discount')
                ->translateLabel()
                ->requiresConfirmation()
                ->modelLabel(__('Add Discount'))
                ->modalDescription(__("Add Discount to the Car Price Per Day"))
                ->modalIcon('tabler-discount')
                ->fillForm(function ($record) {
                    return [
                        'discount' => $record->discount,
                    ];
                })
                ->form([
                    TextInput::make('discount')
                        ->numeric()
                        ->prefix('%')
                        ->label(__("Discount Percentage"))
                        ->minValue(0)
                        ->required()
                        ->placeholder(__("Add Discount Percentage eg. 10%"))
                ])
                ->action(function ($data) {
                    $this->record->update($data);
                    Notification::make()
                        ->icon('heroicon-o-check-circle')
                        ->iconColor('green')
                        ->title('Discount Added')
                        ->body('The discount has been added to the car price per day');
                }
                )
        ];
    }
}
