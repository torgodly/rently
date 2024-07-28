<?php

namespace App\Filament\Office\Resources;

use App\Filament\Office\Pages\CarService;
use App\Filament\Office\Resources\CarResource\Pages;
use App\Filament\Office\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Pages\Page;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'tabler-car';

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
            ->schema(Car::FromFields())->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Car::query()->myCars())
            ->content(view('car'))
            ->paginated([9, 18, 36, 72, 'all'])
            ->defaultPaginationPageOption(9)
            ->filters(
                Car::TableFilter(), Tables\Enums\FiltersLayout::AboveContent
            )
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


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema(Car::infolist())
            ->columns(3);
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
            'view' => Pages\ViewCar::route('/{record}'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }


}

