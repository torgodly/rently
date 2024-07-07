<?php

namespace App\Filament\User\Resources\CarResource\Pages;

use App\Filament\User\Resources\CarResource;
use App\Forms\Components\ViewPrice;
use App\Models\About;
use App\Models\Order;
use App\Rules\DateOverLap;
use Filament\Actions\Action;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Malzariey\FilamentDaterangepickerFilter\Fields\DateRangePicker;

class OrderCar extends Page implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;
    use InteractsWithRecord;


    protected static string $resource = CarResource::class;

    protected static string $view = 'filament.user.resources.car-resource.pages.order-car';

    public $data;

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
        $this->form->fill($this->data?->toArray() ?? []);
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Group::make([
                    Section::make(__('Car Info'))->schema([
                        \Filament\Forms\Components\Grid::make()->schema([
                            Select::make('pickup_location_id')
                                ->searchable()
                                ->preload()
                                ->translateLabel()
                                ->label('Pickup Location')
                                ->relationship('pickupLocation', 'name')
                                ->required(),
                            Select::make('return_location_id')
                                ->searchable()
                                ->preload()
                                ->translateLabel()
                                ->label('Return Location')
                                ->relationship('returnLocation', 'name')
                                ->required(),
                            DateRangePicker::make('date_range')
                                ->disabledDates($this->record->getUnavailableDatesAttribute())
                                ->rules([new DateOverLap($this->record)])
                                ->translateLabel()
                                ->label('Reservation Period')
                                ->translateLabel()
                                ->required()
                                ->columnSpanFull(),

                        ])->columns(2),

                    ]),
                ])->columnSpan(['lg' => 2]),
                Group::make([
                    Section::make(__('Pricing'))->schema([
                        ViewPrice::make('price')
                            ->disabled()
                            ->translateLabel()
                            ->label('Price')
//                            ->required(),
                    ]),
//                    Section::make(__('Car Details'))->schema([
//                        Grid::make()->schema([
//                            TextInput::make('color')
//                                ->prefixIcon('tabler-color-swatch')
//                                ->translateLabel()
//                                ->label('Color')
//                                ->required(),
//                            TextInput::make('license_plate')
//                                ->prefixIcon('tabler-id')
//                                ->translateLabel()
//                                ->label('License Plate')
//                                ->required(),
//                            TextInput::make('mileage')
//                                ->prefix('km')
//                                ->translateLabel()
//                                ->label('Mileage')
//                                ->required(),
//                            TextInput::make('mileage_to_service')
//                                ->prefix('km')
//                                ->translateLabel()
//                                ->label('Mileage To Service')
//                                ->required(),
//                            TextInput::make('seats')
//                                ->prefixIcon('tabler-armchair')
//                                ->translateLabel()
//                                ->label('Seats')
//                                ->required(),
//                            Select::make('transmission_type')
//                                ->prefixIcon('tabler-manual-gearbox')
//                                ->translateLabel()
//                                ->label('Transmission Type')
//                                ->options([
//                                    'automatic' => 'Automatic',
//                                    'manual' => 'Manual',
//                                ])
//                                ->required(),
//                            Select::make('fuel_type')
//                                ->prefixIcon('tabler-gas-station')
//                                ->translateLabel()
//                                ->label('Fuel Type')
//                                ->options([
//                                    'petrol' => 'Petrol',
//                                    'diesel' => 'Diesel',
//                                    'electric' => 'Electric',
//                                ])
//                                ->required(),
//                        ])->columns(2),
//                    ]),
                ])->columnSpan(['lg' => 1]),
            ])
            ->model(Order::class)
            ->statePath('data')
            ->columns(3);
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            list($start, $end) = explode(' - ', $data['date_range']);
            $data['pickup_date'] = $start;
            $data['return_date'] = $end;
            $data['user_id'] = auth()->id();
//            dd($data);
            $this->record->reservations()->create($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }
}
