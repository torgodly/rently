<?php

namespace App\Models;

use App\Infolists\Components\CarEntry;
use Carbon\Carbon;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'pickup_date',
        'return_date',
        'location',
        'status',
    ];

    public static function TableColumns()
    {
        return [
            TextColumn::make('user.name')
                ->label('Client')
                ->translateLabel()
                ->numeric()
                ->sortable(),
            TextColumn::make('car.name')
                ->label('The Car')
                ->translateLabel()
                ->numeric()
                ->sortable(),
            TextColumn::make('pickupLocation.name')
                ->translateLabel()
                ->searchable(),
            TextColumn::make('returnLocation.name')
                ->translateLabel()
                ->searchable(),
            TextColumn::make('days_booked')
                ->translateLabel()
                ->numeric()
                ->sortable(),

            TextColumn::make('status')
                ->formatStateUsing(fn(string $state): string => __($state))
                ->color(fn(string $state): string => match ($state) {
                    'Pending' => 'gray',
                    'Confirmed' => 'yellow',
                    'Active' => 'green',
                    'Completed' => 'blue',
                    'Cancelled' => 'red',
                })
                ->translateLabel()
                ->badge(),
            TextColumn::make('created_at')
                ->translateLabel()
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->translateLabel()
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public static function InfoListEntry()
    {
        return [
            Group::make([
                Section::make(__('Order Info'))->schema([
                    Fieldset::make(__('Identifier'))->schema([
                        ImageEntry::make('user.passport')
                            ->hiddenLabel()
                            ->height(500)
                            ->columnSpanFull()
                    ]),
                    Fieldset::make(__('Client'))
                        ->schema([
                            Grid::make()->schema([
                                TextEntry::make('user.name')
                                    ->label('Name')
                                    ->translateLabel(),
                                TextEntry::make('user.email')
                                    ->label('Email')
                                    ->translateLabel(),
                                TextEntry::make('user.phone')
                                    ->label('Phone')
                                    ->translateLabel(),
                                TextEntry::make('user.points')
                                    ->badge()
                                    ->icon('tabler-trophy')
                                    ->label('Points')
                                    ->translateLabel(),
//                                TextEntry::make('user.passport')
//                                    ->placeholder('passport')
//                                    ->translateLabel()
//                                    ->action(Action::make('delete')
//                                        ->fillForm(fn($record) => [
//                                            'passport' => $record->user->passport,
//                                        ])
//                                        ->modalCancelAction(false)
//                                        ->modalSubmitAction(false)
//                                        ->form([
//                                            ViewField::make('passport')
//                                                ->view('passport')
//                                                ->translateLabel(),
//                                        ])
//                                    )
//                                    ->translateLabel(),

                            ])
                        ]),
                    Fieldset::make(__('Order'))->schema([
                        Grid::make()->schema([
                            TextEntry::make('pickup_date')
                                ->dateTime('H:i d-m-Y')
                                ->label('Pickup Date')
                                ->translateLabel(),
                            TextEntry::make('return_date')
                                ->dateTime('H:i d-m-Y')
                                ->label('Return Date')
                                ->translateLabel(),
                            TextEntry::make('pickupLocation.name')
                                ->url(fn($record) => $record->pickupLocation->url)
                                ->openUrlInNewTab()
                                ->label('Pickup Location')
                                ->translateLabel(),
                            TextEntry::make('returnLocation.name')
                                ->url(fn($record) => $record->returnLocation->url)
                                ->openUrlInNewTab()
                                ->label('Return Location')
                                ->translateLabel(),
                            TextEntry::make('days_booked')
                                ->label('Days Booked')
                                ->translateLabel(),
                            TextEntry::make('status')
                                ->badge()
                                ->label('Order Status')
                                ->formatStateUsing(fn(string $state): string => __($state))
                                ->color(fn(string $state): string => match ($state) {
                                    'Pending' => 'gray',
                                    'Confirmed' => 'yellow',
                                    'Active' => 'green',
                                    'Completed' => 'blue',
                                    'Cancelled' => 'red',
                                })
                                ->translateLabel(),
                        ])
                    ]),

                ])
            ])->columnSpan(2),
            Group::make([
                Section::make(__('Price'))->schema([
                    ViewEntry::make('price')
                        ->view('price')

                ]),
                Section::make(__('Status'))->schema([
                    ViewEntry::make('status')
                        ->view('status')

                ]),
                Section::make(__('Car Info'))->schema([
                    CarEntry::make('car')
                        ->hiddenLabel()
                ])
            ])->columnSpan(1)
        ];
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    //location

    public function getPriceAttribute()
    {
        $days = Carbon::parse($this->pickup_date)->diffInDays(Carbon::parse($this->return_date));
        return round($days * $this->car->price_per_day, 2);
    }

    public function pickupLocation()
    {
        return $this->belongsTo(Location::class, 'pickup_location_id');
    }

    public function returnLocation()
    {
        return $this->belongsTo(Location::class, 'return_location_id');
    }

    public function scopeMyOrders($query)
    {
        return $query->whereHas('car', function ($q) {
            $q->where('branch_id', auth()->user()->branch->id);
        });
    }


    //my orders

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function Confirmed(): void
    {
        try {
            $this->user->withdraw($this->price);
            // If withdrawal succeeds, update order status to 'Confirmed'
            $this->update([
                'status' => 'Confirmed'
            ]);
        } catch (\Exception $e) {
            // If withdrawal fails (insufficient balance), update order status to 'Cancelled'
            $this->update([
                'status' => 'Cancelled'
            ]);
        }
    }

    //Inprogress
    public function Active(): void
    {
        $this->update([
            'status' => 'Active'
        ]);
    }

    //Completed
    public function Completed($mileage): void
    {
        $this->update([
            'status' => 'Completed'
        ]);
        $mileage_drove = $mileage - $this->car->mileage;
        if ($mileage_drove > $this->car->mileage_to_service) {
            $this->car->update([
                'mileage' => $mileage,
                'mileage_to_service' => 0,
                'status' => 'service'
            ]);
            return;
        }
        $this->car->update([
            'mileage' => $mileage,
            'mileage_to_service' => $this->car->mileage_to_service - $mileage_drove
        ]);
    }

}
