<?php

namespace App\Models;

use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'long',
        'lat',
        'branch_id'
    ];


    //url google map

    public static function FromField(): array
    {
        return [
            TextInput::make('long')
                ->translateLabel()
                ->required()
                ->maxLength(255),
            TextInput::make('lat')
                ->translateLabel()
                ->required()
                ->maxLength(255),


            Select::make('branch_id')
                ->label('Branch')
                ->searchable()
                ->translateLabel()
                ->options(
                    Branch::pluck('name', 'id')
                )
                ->required(fn() => Auth::user()->isAdmin())
                ->visible(fn() => Auth::user()->isAdmin()),

            TextInput::make('name')
                ->translateLabel()
                ->hintAction(
                    Action::make('Set Default Location')
                        ->translateLabel()
                        ->icon('heroicon-m-map-pin')
                        ->action(function (Set $set, $state, $livewire): void {
                            $set('location', ['lng' => '13.179766193299535', 'lat' => '32.89316984677032']);
                            $set('long', '13.179766193299535');
                            $set('lat', '32.89316984677032');
                            $livewire->dispatch('refreshMap');
                        })
                )
                ->required()
                ->columnSpan(fn() => Auth::user()->isAdmin() ? 1 : 2)
                ->maxLength(255),


            Map::make('location')
                ->dehydrated()
                ->label('Location')
                ->columnSpanFull()
                ->afterStateUpdated(function (Get $get, Set $set, string|array|null $old, ?array $state): void {
                    $set('long', $state['lng']);
                    $set('lat', $state['lat']);
                })
                ->afterStateHydrated(function ($state, $record, Set $set): void {
                    $set('location', ['lng' => $record?->long, 'lat' => $record?->lat]);
                })
                ->extraStyles([
                    'min-height: 50vh',
                    'border-radius: 20px'
                ])
                ->liveLocation()
                ->showMarker()
                ->markerColor("#22c55eff")
                ->showFullscreenControl()
                ->showZoomControl()
                ->draggable()
                ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                ->zoom(15)
                ->detectRetina()
                ->extraTileControl([])
                ->extraControl([
                    'zoomDelta' => 1,
                    'zoomSnap' => 2,
                ])


        ];
    }

    public static function TableColumns()
    {
        return [
            TextColumn::make('long')
                ->translateLabel()
                ->searchable()
                ->sortable(),

            TextColumn::make('lat')
                ->translateLabel()
                ->searchable()
                ->sortable(),

            TextColumn::make('name')
                ->translateLabel()
                ->searchable()
                ->sortable(),

            IconColumn::make('url')
                ->icon('tabler-map-2')
                ->url(fn($record) => $record->url)
                ->openUrlInNewTab()
                ->label('Open in Google Map')
                ->translateLabel()
        ];

    }

    public function getUrlAttribute()
    {
        return 'https://www.google.com/maps/search/?api=1&query=' . $this->lat . ',' . $this->long;
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

//myLocations
    public function scopeMyLocations($query)
    {
        return $query->where('branch_id', auth()->user()->branch->id);
    }

//    active location scope
    public function scopeActive($query)
    {
        return $query->wherehas('branch', function ($query) {
            $query->where('status', 1);
        });
    }
}
