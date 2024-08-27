<?php

namespace App\Filament\Office\Pages;

use App\Models\Car;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

class CarService extends Page implements HasTable
{

    use InteractsWithTable;

    protected static ?string $navigationIcon = 'tabler-car-garage';

    protected static string $view = 'filament.office.pages.car-service';

    public static function getNavigationGroup(): ?string
    {
        return __('Management');
    }

    public static function getNavigationLabel(): string
    {
        return __(parent::getNavigationLabel()); // TODO: Change the autogenerated stub
    }

    public static function getNavigationBadge(): ?string
    {
        return Car::query()->where('mileage_to_service', '0')->count();
    }


    public static function table(Table $table): Table
    {
        return $table
            ->query(Car::query()->where('mileage_to_service', '0'))
//            ->content(view('car'))
            ->columns([
                TextColumn::make('name')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('license_plate')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mileage')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mileage_to_service')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

            ])
            ->filters(Car::TableFilter(), FiltersLayout::AboveContent)
            ->actions([
                Action::make('Service')
                    ->label('Car Service')
                    ->translateLabel()
                    ->requiresConfirmation()
                    ->modalIcon('tabler-car-garage')
                    ->modalDescription(__('Set the new mileage until the next service after the car has been serviced.'))
                    ->form([
                        TextInput::make('mileage_to_service')
                            ->label('Miles Until Next Service')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->rules('numeric')
                    ])
                    ->action(function (Car $car, array $data) {
                        $car->update($data);
                        Notification::make()
                            ->success()
                            ->title(__('Car Service Completed'))
                            ->body(__('The car has been serviced and is ready for rental. The new mileage until the next service is set.'))
                            ->icon('tabler-car-garage')
                            ->send();
                    }),


            ]);
    }
}