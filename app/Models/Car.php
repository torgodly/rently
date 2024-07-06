<?php

namespace App\Models;

use Carbon\Carbon;
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
use Filament\Tables\Filters\SelectFilter;
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
    ];

    public static function TableFilter()
    {
        return [
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
                            ->visible(fn() => auth()->user()->id === 1)
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
                            ->label('Available')
                            ->default(false),

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
                            ->label('Mileage')
                            ->required(),
                        TextInput::make('mileage_to_service')
                            ->prefix('km')
                            ->translateLabel()
                            ->label('Mileage To Service')
                            ->required(),
                        TextInput::make('seats')
                            ->prefixIcon('tabler-armchair')
                            ->translateLabel()
                            ->label('Seats')
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

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    //name

    public function scopeMyCars($query)
    {
        return $query->where('branch_id', auth()->user()->branch->id);
    }

    public function reservations()
    {
        return $this->hasMany(Order::class);
    }

    //my car scope

    public function getUnavailableDatesAttribute()
    {
        return $this->reservations->flatMap(function ($reservation) {
            $dates = CarbonPeriod::create($reservation->pickup_date, $reservation->return_date->addday())->toArray();
            return array_map(function($date) {
                return $date->format('Y-m-d');
            }, $dates);
        })->toArray();
    }


    //orders

    protected function getHeroAttribute(): string
    {
        return $this->getFirstMediaUrl('car_images');
    }
    //get unavailable dates for car
    //eg. ['2024-07-01' , '2024-07-02']

    protected function getNameAttribute(): string
    {
        return $this->make . ' ' . $this->model . ' ' . $this->manufacturing_year;
    }

}
