<?php

namespace App\Models;

use App\Infolists\Components\PriceEntry;
use Carbon\CarbonPeriod;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'make',
        'model',
        'manufacturing_year',
        'color',
        'license_plate',
        'mileage',
        'mileage_to_service',
        'transmission_type',
        'fuel_type',
        'price_per_day',
        'available',
        'branch_id',
        'description',
        'seats',
        'body_style',
        'status',
        "discount"
    ];

    public static function TableFilter()
    {
        return [
            Filter::make('Location')
                ->visible(fn() => auth()->user()->isUser())
                ->columnSpan(2)
                ->form([
                    Grid::make()->schema([
                        Select::make('pickup_location_id')
                            ->label('Pickup Location')
                            ->translateLabel()
                            ->options(Location::Active()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->optionsLimit(12000),
                        Select::make('return_location_id')
                            ->label('Return Location')
                            ->translateLabel()
                            ->options(Location::Active()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->optionsLimit(12000),
                    ])
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['pickup_location_id'] ?? null,
                            fn(Builder $query, $pickupLocationId): Builder => $query->whereHas('branch', fn($query) => $query->whereHas('locations', fn($query) => $query->where('id', $pickupLocationId))
                            ))
                        ->when(
                            $data['return_location_id'] ?? null,
                            fn(Builder $query, $returnLocationId): Builder => $query->whereHas('branch', fn($query) => $query->whereHas('locations', fn($query) => $query->where('id', $returnLocationId))
                            ));
                }),


            SelectFilter::make('make')
                ->label('Make')
                ->translateLabel()
                ->options(CarReference::all()->pluck('make', 'make')->toArray())
                ->searchable()
                ->optionsLimit(12000),
            SelectFilter::make('model')
                ->label('Model')
                ->translateLabel()
                ->options(CarReference::pluck('model', 'model')->toArray())
                ->searchable()
                ->optionsLimit(12000),
            SelectFilter::make('manufacturing_year')
                ->label('Manufacturing Year')
                ->translateLabel()
                ->options(CarReference::pluck('year', 'year')->toArray())
                ->searchable()
                ->optionsLimit(12000),
            SelectFilter::make('body_style')
                ->label('Body Style')
                ->translateLabel()
                ->options(collect(CarReference::pluck('body_style', 'body_style')->toArray())
                    ->flatMap(function ($jsonKey, $jsonValue) {
                        return array_unique(array_merge(json_decode($jsonKey), json_decode($jsonValue)));
                    })
                    ->mapWithKeys(function ($style) {
                        return [$style => $style];
                    })
                    ->toArray()
                )
                ->searchable()
                ->optionsLimit(12000),

            //fuel type
            SelectFilter::make('fuel_type')
                ->label('Fuel Type')
                ->translateLabel()
                ->options([
                    'petrol' => 'Petrol',
                    'diesel' => 'Diesel',
                    'electric' => 'Electric',
                ]),



            Filter::make('Price')
                ->columnSpan(2)
                ->form([
                    Grid::make()->schema([
                        TextInput::make('price_from')
                            ->label('Price From')
                            ->translateLabel()
                            ->suffix('د.ل')
                            ->type('number'),
                        TextInput::make('price_to')
                            ->label('Price To')
                            ->translateLabel()
                            ->suffix('د.ل')
                            ->type('number'),
                    ])
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['price_from'] ?? null,
                            fn(Builder $query, $price_from): Builder => $query->where('price_per_day', '>=', $price_from)
                        )
                        ->when(
                            $data['price_to'] ?? null,
                            fn(Builder $query, $price_to): Builder => $query->where('price_per_day', '<=', $price_to)
                        );
                }),

            SelectFilter::make('seats')
                ->label('Seats')
                ->translateLabel()
                ->options(collect(range(1, 10))->mapWithKeys(function ($seat) {
                    return [$seat => $seat];
                })->toArray()),

            SelectFilter::make('branch_id')
                ->label('Branch')
                ->translateLabel()
                ->options(Branch::all()->pluck('name', 'id')->toArray())
                ->searchable()
                ->optionsLimit(12000),

            //available
            SelectFilter::make('available')
                ->label('Available')
                ->translateLabel()
                ->visible(fn() => !auth()->user()->isUser())
                ->options([
                    '1' => __('Available'),
                    '0' => __('Not Available'),
                ]),

        ];
    }

    public static function FromFields(): array
    {
        return [
            Group::make([
                Section::make(__('Car Info'))->schema([
                    Grid::make()->schema([
                        Select::make('branch_id')
                            ->translateLabel()
                            ->label('Branch')
                            ->visible(fn() => auth()->user()->isAdmin())
                            ->options(fn() => \App\Models\Branch::all()->pluck('name', 'id')->toArray())
                            ->required(),
                        Select::make('make')
                            ->translateLabel()
                            ->label('Make')
                            ->options(CarReference::all()->pluck('make', 'make')->toArray())
                            ->searchable()
                            ->live()
                            ->optionsLimit(12000)
                            ->required(),
                        Select::make('model')
                            ->translateLabel()
                            ->label('Model')
                            ->options(fn(Get $get) => CarReference::where('make', $get('make'))->pluck('model', 'model')->toArray())
                            ->searchable()
                            ->live()
                            ->optionsLimit(12000)
                            ->required(),
                        Select::make('manufacturing_year')
                            ->translateLabel()
                            ->live()
                            ->label('Manufacturing Year')
                            ->searchable()
                            ->optionsLimit(12000)
                            ->options(fn(Get $get) => CarReference::where('model', $get('model'))->pluck('year', 'year')->toArray())
                            ->required(),
                        Select::make('body_style')
                            ->translateLabel()
                            ->live()
                            ->label('Body Style')
                            ->searchable()
                            ->optionsLimit(12000)
                            ->options(function (Get $get) {
                                return collect(CarReference::where('model', $get('model'))->where('make', $get('make'))->where('year', $get('manufacturing_year'))->pluck('body_style', 'body_style')->toArray())
                                    ->flatMap(function ($jsonKey, $jsonValue) {
                                        return array_unique(array_merge(json_decode($jsonKey), json_decode($jsonValue)));
                                    })
                                    ->mapWithKeys(function ($style) {
                                        return [$style => $style];
                                    })
                                    ->toArray();
                            }
                            )->required(),
                        RichEditor::make('description')
                            ->translateLabel()
                            ->columnSpanFull()
                    ])->columns(4),
                ]),
                Section::make(__('Images'))->schema([
                    SpatieMediaLibraryFileUpload::make('images')
                        ->reorderable()
                        ->translateLabel()
                        ->label('Images')
                        ->rules(['required'])
                        ->multiple()
                        ->collection('car_images')
                ])
            ])->columnSpan(['lg' => 2]),
            Group::make([
                Section::make(__('Pricing'))->schema([
                    Grid::make()->schema([
                        TextInput::make('price_per_day')
                            ->translateLabel()
                            ->label('Price Per Day')
                            ->required(),
                        Toggle::make('available')
                            ->translateLabel()
                            ->inline(false)
                            ->default(true)
                            ->label('Available'),

                    ])->columns(2),
                ]),
                Section::make(__('Car Details'))->schema([
                    Grid::make()->schema([
                        TextInput::make('color')
                            ->prefixIcon('tabler-color-swatch')
                            ->translateLabel()
                            ->label('Color')
                            ->required(),

                        TextInput::make('license_plate')
                            ->prefixIcon('tabler-id')
                            ->translateLabel()
                            ->label('License Plate')
                            ->required(),
                        TextInput::make('mileage')
                            ->prefix('km')
                            ->translateLabel()
                            ->numeric()
                            ->label('Mileage')
                            ->required(),
                        TextInput::make('mileage_to_service')
                            ->prefix('km')
                            ->translateLabel()
                            ->numeric()
                            ->label('Mileage To Service')
                            ->required(),
                        TextInput::make('seats')
                            ->prefixIcon('tabler-armchair')
                            ->translateLabel()
                            ->label('Seats')
                            ->numeric()
                            ->maxValue(10)
                            ->required(),
                        Select::make('transmission_type')
                            ->prefixIcon('tabler-manual-gearbox')
                            ->translateLabel()
                            ->label('Transmission Type')
                            ->options([
                                'automatic' => 'Automatic',
                                'manual' => 'Manual',
                            ])
                            ->required(),
                        Select::make('fuel_type')
                            ->prefixIcon('tabler-gas-station')
                            ->translateLabel()
                            ->label('Fuel Type')
                            ->options([
                                'petrol' => 'Petrol',
                                'diesel' => 'Diesel',
                                'electric' => 'Electric',
                            ])
                            ->required(),
                    ])->columns(2),
                ]),
            ])->columnSpan(['lg' => 1]),
        ];
    }

    //hero
    public static function infolist()
    {
        return [
            \Filament\Infolists\Components\Group::make([
                \Filament\Infolists\Components\Section::make(__('General Information'))->schema([
                    \Filament\Infolists\Components\Fieldset::make(__('Car Information'))->schema([
                        \Filament\Infolists\Components\Grid::make(['default' => 2])->schema([

                            TextEntry::make('make')->weight(FontWeight::Medium)->translateLabel(),

                            TextEntry::make('model')->weight(FontWeight::Medium)->translateLabel(),

                            TextEntry::make('manufacturing_year')->weight(FontWeight::Medium)->translateLabel(),

                            TextEntry::make('body_style')->weight(FontWeight::Medium)->translateLabel(),
                        ]),
                    ]),
                    \Filament\Infolists\Components\Fieldset::make(__('Description'))->schema([
                        TextEntry::make('description')->columnSpanFull()->translateLabel(),
                        SpatieMediaLibraryImageEntry::make('image')
                            ->hiddenLabel()
                            ->collection('car_images')
                            ->columnSpanFull()
                            ->extraImgAttributes([
                                'style' => "height: auto;width: 100%;"
                            ]),
                    ]),
                ]),
            ])->columnSpan(['lg' => 2]),
            \Filament\Infolists\Components\Group::make([
                \Filament\Infolists\Components\Section::make(__('Specific Information'))->schema([
                    \Filament\Infolists\Components\Fieldset::make(__('Price'))->schema([
                        PriceEntry::make('price_per_day')->hiddenLabel()->columnSpanFull()->translateLabel()
                    ]),
                    \Filament\Infolists\Components\Fieldset::make(__('Car Details'))->schema([
                        \Filament\Infolists\Components\Grid::make(['default' => 2])->schema([

                            TextEntry::make('color')->weight(FontWeight::Medium)->icon('tabler-color-swatch')->translateLabel(),
                            TextEntry::make('license_plate')->weight(FontWeight::Medium)->icon('tabler-id')->translateLabel(),
                            TextEntry::make('mileage')->weight(FontWeight::Medium)->icon('tabler-car')->prefix('km ')->translateLabel(),
                            TextEntry::make('mileage_to_service')->weight(FontWeight::Medium)->icon('tabler-car')->prefix('km ')->translateLabel(),
                            TextEntry::make('seats')->weight(FontWeight::Medium)->icon('tabler-armchair')->translateLabel(),
                            TextEntry::make('transmission_type')->weight(FontWeight::Medium)->icon('tabler-manual-gearbox')->translateLabel(),
                            TextEntry::make('fuel_type')->weight(FontWeight::Medium)->icon('tabler-gas-station')->translateLabel(),
                        ]),
                    ]),
                ]),
            ])->columnSpan(['lg' => 1]),

        ];
    }

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    //name

    public function scopeMyCars($query)
    {
        return $query->where('branch_id', auth()->user()->branch->id)->where('mileage_to_service', '>', 0);
    }

    //scop customer cars
    public function scopeUserCars($query)
    {
        return $query->where('mileage_to_service', '>', 0)->where('available', true)->wherehas('branch', function ($query) {
            $query->where('status', true);
        });
    }

    public function reservations()
    {
        return $this->hasMany(Order::class);
    }

    //my car scope

    public function getUnavailableDatesAttribute()
    {
        return $this->reservations->where('status', '!=', 'Cancelled')->flatMap(function ($reservation) {
            $dates = CarbonPeriod::create($reservation->pickup_date, $reservation->return_date)->toArray();
            return array_map(function ($date) {
                return $date->format('Y-m-d');
            }, $dates);
        })->toArray();
    }

    //list of dates where car is booked


    //orders

    public function service($mileage)
    {
        $this->mileage_to_service = $mileage;
        $this->save();
    }
    //get unavailable dates for car
    //eg. ['2024-07-01' , '2024-07-02']

    protected function getHeroAttribute(): string
    {
        return $this->getFirstMediaUrl('car_images');
    }

    //service .. update mileage to service

    protected function getNameAttribute(): string
    {
        return $this->make . ' ' . $this->model . ' ' . $this->manufacturing_year;
    }


    //image
    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('car_images');
    }
}
