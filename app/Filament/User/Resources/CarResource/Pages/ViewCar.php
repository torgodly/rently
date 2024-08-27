<?php

namespace App\Filament\User\Resources\CarResource\Pages;

use App\Filament\User\Resources\CarResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewCar extends ViewRecord
{
    protected static string $resource = CarResource::class;


    protected function getHeaderActions(): array
    {
        return [
//            Actions\EditAction::make(),
            Actions\Action::make('Order')
                ->label('Order Now')
                ->translateLabel()
                ->action(function () {
                    if (auth()->user()->isVerified()) {
                        $this->redirect(CarResource::getUrl('order', [$this->record]));
                    } else {
                        $this->redirect('/user/my-profile');
                        Notification::make()
                            ->title(__("You are not verified"))
                            ->body(__("Please verify your account to continue"))
                            ->danger()
                            ->icon('tabler-alert-triangle')
                            ->send();
                    }
                })
        ];
    }
}
