<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use App\Models\CarReference;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Management');
    }

    public static function getModelLabel(): string
    {
        return __('Car');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Cars');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Section::make(__('Car Info'))->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Select::make('branch_id')
                                ->translateLabel()
                                ->label('Branch')
                                ->options(fn() => \App\Models\Branch::all()->pluck('name', 'id')->toArray())
                                ->required(),
                            Forms\Components\Select::make('make')
                                ->translateLabel()
                                ->label('Make')
                                ->options(CarReference::all()->pluck('make', 'make')->toArray())
                                ->searchable()
                                ->optionsLimit(12000)
                                ->required(),
                            Forms\Components\Select::make('model')
                                ->translateLabel()
                                ->live()
                                ->label('Model')
                                ->options(CarReference::all()->pluck('model', 'model')->toArray())
                                ->searchable()
                                ->optionsLimit(12000)
                                ->required(),
                            Forms\Components\Select::make('manufacturing_year')
                                ->translateLabel()
                                ->live()
                                ->label('Manufacturing Year')
                                ->searchable()
                                ->optionsLimit(12000)
                                ->options(CarReference::all()->pluck('year', 'year')->toArray())
                                ->required(),
                            Forms\Components\Select::make('body_style')
                                ->translateLabel()
                                ->live()
                                ->label('Body Style')
                                ->searchable()
                                ->optionsLimit(12000)
                                ->options(
                                    collect(CarReference::all()->pluck('body_style', 'body_style')->toArray())
                                        ->flatMap(function ($jsonKey, $jsonValue) {
                                            return array_unique(array_merge(json_decode($jsonKey), json_decode($jsonValue)));
                                        })
                                        ->mapWithKeys(function ($style) {
                                            return [$style => $style];
                                        })
                                        ->toArray()
                                )->required(),
                            Forms\Components\RichEditor::make('description')
                                ->translateLabel()
                                ->columnSpanFull()
                        ])->columns(4),
                    ]),
                    Forms\Components\Section::make(__('Images'))->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                            ->reorderable()
                            ->translateLabel()
                            ->label('Images')
                            ->rules(['required'])
                            ->multiple()
                            ->collection('car_images')
                    ])
                ])->columnSpan(['lg' => 2]),
                Forms\Components\Group::make([
                    Forms\Components\Section::make(__('Pricing'))->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\TextInput::make('price_per_day')
                                ->translateLabel()
                                ->label('Price Per Day')
                                ->required(),
                            Forms\Components\Toggle::make('available')
                                ->translateLabel()
                                ->inline(false)
                                ->default(true)
                                ->label('Available')
                                ->default(false),

                        ])->columns(2),
                    ]),
                    Forms\Components\Section::make(__('Car Details'))->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\TextInput::make('color')
                                ->prefixIcon('tabler-color-swatch')
                                ->translateLabel()
                                ->label('Color')
                                ->required(),
                            Forms\Components\TextInput::make('license_plate')
                                ->prefixIcon('tabler-id')
                                ->translateLabel()
                                ->label('License Plate')
                                ->required(),
                            Forms\Components\TextInput::make('mileage')
                                ->prefix('km')
                                ->translateLabel()
                                ->label('Mileage')
                                ->required(),
                            Forms\Components\TextInput::make('mileage_to_service')
                                ->prefix('km')
                                ->translateLabel()
                                ->label('Mileage To Service')
                                ->required(),
                            Forms\Components\TextInput::make('seats')
                                ->prefixIcon('tabler-armchair')
                                ->translateLabel()
                                ->label('Seats')
                                ->required(),
                            Forms\Components\Select::make('transmission_type')
                                ->prefixIcon('tabler-manual-gearbox')
                                ->translateLabel()
                                ->label('Transmission Type')
                                ->options([
                                    'automatic' => 'Automatic',
                                    'manual' => 'Manual',
                                ])
                                ->required(),
                            Forms\Components\Select::make('fuel_type')
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
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->content(view('car'))
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('images')
                    ->translateLabel()
                    ->label('Image')
                    ->circular()
                    ->stacked()
                    ->collection('car_images'),
                Tables\Columns\TextColumn::make('model')
                    ->translateLabel()
                    ->description(fn(Car $record): string => $record->make . '-' . $record->manufacturing_year)
                    ->searchable(),
                Tables\Columns\TextColumn::make('color')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->label('License Plate')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mileage')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('transmission_type')
                    ->label('Transmission Type')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('fuel_type')
                    ->label('Fuel Type')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('price_per_day')
                    ->translateLabel()
                    ->label('Price Per Day')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('branch.name')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('available')
                    ->translateLabel()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
            'view' => Pages\ViewCar::route('/{record}'),
        ];
    }
}
