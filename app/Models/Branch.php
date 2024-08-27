<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'country',
        'manager_id',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function cars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Car::class);
    }

    public static function FormFields()
    {
        return [
            TextInput::make('name')
                ->translateLabel()
                ->required()
                ->maxLength(255),
            Country::make('country')
                ->translateLabel()
                ->searchable(),
            TextInput::make('city')
                ->translateLabel()
                ->required()
                ->maxLength(255),
            Select::make('manager_id')
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

        ];
    }

    public static function TableColumns()
    {
        return [
       TextColumn::make('name')->translateLabel()
                ->searchable(),
       TextColumn::make('city')->translateLabel()
                ->searchable(),
       TextColumn::make('country')->translateLabel()
                ->searchable(),
       TextColumn::make('manager.name')
                ->translateLabel()
                ->numeric()
                ->sortable(),
       ToggleColumn::make('status')
       ->translateLabel(),
       TextColumn::make('created_at')->translateLabel()
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
       TextColumn::make('updated_at')->translateLabel()
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    //locations
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
