<?php

namespace App\Filament\Resources;

use App\Enums\UserType;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function getNavigationGroup(): ?string
    {
        return __('User Management');
    }

    public static function getModelLabel(): string
    {
        return __('User');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Users');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->translateLabel()
                    ->email()
                    ->unique('users', 'email', ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->translateLabel()
                    ->tel()
                    ->unique('users', 'phone', ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->translateLabel()
                    ->required()
                    ->options(UserType::array())
                    ->default('user'),
                Forms\Components\TextInput::make('password')
                    ->visibleOn('create')
                    ->translateLabel()
                    ->password()
                    ->required()
                    ->confirmed()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password_confirmation')
                    ->visibleOn('create')
                    ->translateLabel()
                    ->password()
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->translateLabel()
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->translateLabel()
                    ->badge()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('active')
                    ->disabled(fn (Model $record) => $record->isAdmin())
                    ->translateLabel(),
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
                Tables\Actions\EditAction::make()
                    ->modelLabel(__('User'))
                    ->requiresConfirmation(true)
                    ->modalWidth('2xl')
                    ->modalIcon('heroicon-o-users')
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
            'index' => Pages\ListUsers::route('/'),
//            'create' => Pages\CreateUser::route('/create'),
//            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
