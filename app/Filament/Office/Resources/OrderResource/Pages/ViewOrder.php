<?php

namespace App\Filament\Office\Resources\OrderResource\Pages;

use App\Filament\Office\Resources\OrderResource;
use Filament\Actions;
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
                ->color('green')
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
                        ->iconColor($record->status == 'Cancelled' ? 'red' : 'green')
                        ->color($record->status == 'Cancelled' ? 'red' : 'green')
                        ->title($record->status == 'Cancelled' ? __('Order Cancelled') : __('Order Accepted'))
                        ->body($record->status == 'Cancelled' ? __('The order has been cancelled Because Clint Doesn\'t have the balance') : __('The order has been accepted'))
                        ->send();
                    Notification::make()
                        ->icon($record->status == 'Cancelled' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->iconColor($record->status == 'Cancelled' ? 'red' : 'green')
                        ->color($record->status == 'Cancelled' ? 'red' : 'green')
                        ->title($record->status == 'Cancelled' ? __('Order Cancelled') : __('Order Accepted'))
                        ->body($record->status == 'Cancelled' ? __('Your order has been cancelled Because You Do\'t have the balance') : __('Your order has been accepted'))
                        ->sendToDatabase($record->user);
                }),

            //In Progress
            Actions\Action::make('In Progress')
                ->color('yellow')
                ->translateLabel()
                ->requiresConfirmation()
                ->modelLabel(__('In Progress'))
                ->modalDescription(__('Are you sure you want to start this order?'))
                ->modalIcon('heroicon-o-play')
                ->visible(fn($record) => $record->status == 'Confirmed')
                ->action(function ($record) {
                    $record->inProgress();
                    Notification::make()
                        ->icon('heroicon-o-play')
                        ->iconColor( 'yellow')
                        ->color( 'yellow')
                        ->title(__('Order Started'))
                        ->body(__('The order has been started'))
                        ->send();
                }),


        ];
    }
}
