<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Infolists\Components\CarEntry;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationGroup(): ?string
    {
        return __('Management');
    }

    public static function getModelLabel(): string
    {
        return __('Order');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Orders');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('car_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('pickup_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('return_date')
                    ->required(),
                Forms\Components\TextInput::make('longitude')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order_status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Client')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('car.name')
                    ->label('The Car')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pickupLocation.name')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('returnLocation.name')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('days_booked')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('order_status')
                    ->translateLabel()
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            \Filament\Infolists\Components\Group::make([
                    Section::make('Order Info')->schema([
                    Fieldset::make('Identifier')->schema([
                        ImageEntry::make('user.passport')
                            ->label('Passport')
                            ->height(500)
                            ->columnSpanFull()
                    ]),
                    Fieldset::make('Client')
                        ->schema([
                            Grid::make()->schema([
                                TextEntry::make('user.name')
                                    ->label('Name')
                                    ->columnSpan(1),
                                TextEntry::make('user.email')
                                    ->label('Email')
                                    ->columnSpan(1),
                                TextEntry::make('user.phone')
                                    ->label('Phone')
                                    ->columnSpan(1),
                                TextEntry::make('user.points')
                                    ->badge()
                                    ->icon('tabler-trophy')
                                    ->label('Points')
                            ])
                        ]),
                    Fieldset::make('Order')->schema([
                        Grid::make()->schema([
                            TextEntry::make('pickup_date')
                                ->dateTime('H:i d-m-Y')
                                ->label('Pickup Date')
                                ->columnSpan(1),
                            TextEntry::make('return_date')
                                ->dateTime('H:i d-m-Y')
                                ->label('Return Date')
                                ->columnSpan(1),
                            TextEntry::make('pickupLocation.name')
                                ->url(fn($record) => $record->pickupLocation->url)
                                ->openUrlInNewTab()
                                ->label('Pickup Location')
                                ->columnSpan(1),
                            TextEntry::make('returnLocation.name')
                                ->url(fn($record) => $record->returnLocation->url)
                                ->openUrlInNewTab()
                                ->label('Return Location')
                                ->columnSpan(1),
                            TextEntry::make('days_booked')
                                ->label('Days Booked')
                                ->columnSpan(1),
                            TextEntry::make('order_status')
                                ->badge()
                                ->label('Order Status')
                                ->columnSpan(1),
                        ])
                    ]),

                ])
            ])->columnSpan(2),
            \Filament\Infolists\Components\Group::make([
                Section::make('Price')->schema([
                    ViewEntry::make('price')
                    ->view('price')
                ]),
                Section::make('Car Info')->schema([
                    CarEntry::make('car')->hiddenLabel()
                ])
            ])->columnSpan(1)
        ])->columns(3);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
//            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
//            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
