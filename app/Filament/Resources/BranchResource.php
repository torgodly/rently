<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'tabler-building';

    public static function getNavigationGroup(): ?string
    {
        return __('Management');
    }

    public static function getModelLabel(): string
    {
        return __('Branch');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Branches');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Branch::FormFields());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Branch::TableColumns())
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modelLabel(__('Branch'))
                    ->requiresConfirmation(true)
                    ->modalWidth('2xl')
                    ->modalIcon('heroicon-o-building-office')
                    ->modalDescription(__('Please Fill In All Required Fields Correctly'))
                ,
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
            'index' => Pages\ListBranches::route('/'),
//            'create' => Pages\CreateBranch::route('/create'),
//            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
}
