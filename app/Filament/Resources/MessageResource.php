<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'tabler-messages';

    public static function getNavigationLabel(): string
    {
        return __('Messages');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Messages');
    }

    public static function getModelLabel(): string
    {
        return __('Message');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Sender Name')
                    ->translateLabel()
                    ->sortable(),
                Tables\Columns\TextColumn::make('branch_name')
                    ->label('Branch Name')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('message')
                    ->translateLabel()
                    ->words(10),

                IconColumn::make('is_answer')
                    ->label('Answered')
                    ->translateLabel()
                    ->default(fn($record) => $record->answer ? 1 : 0)
                    ->icon(fn(Message $record) => $record->CanBeAnswered()
                        ? ($record->answer ? 'tabler-circle-check' : 'tabler-circle-x')
                        : 'tabler-circle-off'
                    )
                    ->color(fn(Message $record) => $record->CanBeAnswered()
                        ? ($record->answer ? 'success' : 'danger')
                        : 'gray'
                    )


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),



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
        return parent::infolist($infolist->schema(Message::InfoList())); // TODO: Change the autogenerated stub
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
//            'create' => Pages\CreateMessage::route('/create'),
//            'view' => Pages\ViewMessage::route('/{record}'),
//            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }


}
