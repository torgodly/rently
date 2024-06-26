<?php

namespace App\Filament\Office\Resources\OrderResource\Pages;

use App\Filament\Office\Resources\OrderResource;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\EditAction::make(),
            Actions\Action::make('Accept Order')
                ->color('yellow')
                ->translateLabel()
                ->requiresConfirmation()
                ->modelLabel(__('Accept Order'))
                ->modalDescription(__('Are you sure you want to accept this order?'))
                ->modalIcon('heroicon-o-check-circle')
                ->visible(fn($record) => $record->status == 'Pending')
                ->action(function ($record) {
                    $record->Confirmed();
                    Notification::make()
                        ->icon($record->status == 'Cancelled' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->iconColor($record->status == 'Cancelled' ? 'red' : 'yellow')
                        ->color($record->status == 'Cancelled' ? 'red' : 'yellow')
                        ->title($record->status == 'Cancelled' ? __('Order Cancelled') : __('Order Accepted'))
                        ->body($record->status == 'Cancelled' ? __('The order has been cancelled Because Clint Doesn\'t have the balance') : __('The order has been accepted'))
                        ->send();
                    Notification::make()
                        ->icon($record->status == 'Cancelled' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->iconColor($record->status == 'Cancelled' ? 'red' : 'yellow')
                        ->color($record->status == 'Cancelled' ? 'red' : 'yellow')
                        ->title($record->status == 'Cancelled' ? __('Order Cancelled') : __('Order Accepted'))
                        ->body($record->status == 'Cancelled' ? __('Your order has been cancelled Because You Do\'t have the balance') : __('Your order has been accepted'))
                        ->sendToDatabase($record->user);
                }),

            //In Progress
            Actions\Action::make('Active')
                ->label('Start Order')
                ->translateLabel()
                ->color('green')
                ->translateLabel()
                ->requiresConfirmation()
                ->modelLabel(__('In Progress'))
                ->modalDescription(__('Are you sure you want to start this order?, Please confirm that the presented ID matches the recipient for this order.'))
                ->modalIcon('heroicon-o-play')
                ->modalContent(fn($record) => view('passport', ['passport' => $record->user->passport]))
                ->modalWidth('max-w-3xl')
                ->visible(fn($record) => $record->status == 'Confirmed')
                ->action(function ($record) {
                    $record->Active();
                    Notification::make()
                        ->icon('heroicon-o-play')
                        ->iconColor('green')
                        ->color('green')
                        ->title(__('Order Started'))
                        ->body(__('The order has been started'))
                        ->send();
                    Notification::make()
                        ->icon('heroicon-o-play')
                        ->iconColor('green')
                        ->color('green')
                        ->title(__('Order Started'))
                        ->body(__('Your order has been started'))
                        ->sendToDatabase($record->user);
                }),

            //complete
            Actions\Action::make('Complete Order')
                ->color('blue')
                ->translateLabel()
                ->requiresConfirmation()
                ->modelLabel(__('Complete Order'))
                ->modalDescription(__('Are you sure you want to complete this order?, Please enter the current mileage of the car.'))
                ->modalIcon('heroicon-o-check-circle')
                ->fillForm(fn($record) => [
                    'mileage' => $record->car->mileage,
                ])
                ->form([
                    TextInput::make('mileage')
                        ->prefix('km')
                        ->translateLabel()
                        ->numeric()
                        ->minValue(fn($record) => $record->car->mileage + 1)
                        ->label('Mileage')
                        ->required(),
                ])
                ->visible(fn($record) => $record->status == 'Active')
                ->action(function ($record, array $data) {
                    $record->Completed($data['mileage']);
                    Notification::make()
                        ->icon('heroicon-o-check-circle')
                        ->iconColor('blue')
                        ->color('blue')
                        ->title(__('Order Completed'))
                        ->body(__('The order has been completed'))
                        ->send();
                    Notification::make()
                        ->icon('heroicon-o-check-circle')
                        ->iconColor('blue')
                        ->color('blue')
                        ->title(__('Order Completed'))
                        ->body(__('Your order has been completed'))
                        ->sendToDatabase($record->user);
                }),


        ];
    }
}
