<?php

namespace App\Filament\User\Resources\OrderResource\Pages;

use App\Filament\User\Resources\OrderResource;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    public function getSubheading(): string|Htmlable|null
    {
        return view('CancelMessage'); // TODO: Change the autogenerated stub
    }

    protected function getHeaderActions(): array
    {
        return [
//            Actions\EditAction::make(),
            Actions\Action::make('Cancel Order')
                ->color('danger')
                ->label('Cancel Order')
                ->translateLabel()
                ->requiresConfirmation()
                ->modelLabel(__('Cancel Order'))
                ->modalDescription(__('Are you sure you want to cancel this order?, Please enter the reason for cancellation.'))
                ->modalIcon('heroicon-o-x-circle')
                ->fillForm(fn($record) => [
                    'reason' => '',
                ])
                ->form([
                    TextInput::make('reason')
                        ->translateLabel()
                        ->label('Reason')
                        ->required(),
                ])
                ->visible(fn($record) => in_array($record->status, ['Pending', 'Confirmed']))
                ->action(function ($record, array $data) {
                    $record->Cancelled($data['reason']);
                    Notification::make()
                        ->icon('heroicon-o-x-circle')
                        ->iconColor('red')
                        ->color('red')
                        ->title(__('Order Cancelled'))
                        ->body(__('The order has been cancelled'))
                        ->send();
                    Notification::make()
                        ->icon('heroicon-o-x-circle')
                        ->iconColor('red')
                        ->color('red')
                        ->title(__('Order Cancelled'))
                        ->body(__('Your order has been cancelled'))
                        ->sendToDatabase($record->user);
                }),
        ];
    }
}