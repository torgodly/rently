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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Country::make('country')
                    ->translateLabel()->searchable(),
                Forms\Components\TextInput::make('city')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('manager_id')
                    ->translateLabel()
                    ->required()
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->relationship(
                        'manager',
                        'name',
                        modifyQueryUsing: function (Builder $query, ?Branch $record) {
                            $query->where('type', 'manager')
                                ->whereDoesntHave('branch');

                            if ($record !== null) {
                                $query->orWhere('type', 'manager')
                                    ->whereHas('branch', function ($q) use ($record) {
                                        $q->where('id', $record->id);
                                    });
                            }
                        }
                    ),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('manager.name')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status')->translateLabel(),
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
