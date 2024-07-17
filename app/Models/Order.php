<?php

namespace App\Models;

use App\Infolists\Components\CarEntry;
use App\Infolists\Components\PassportEntry;
use App\Infolists\Components\ShowPrice;
use Carbon\Carbon;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'pickup_location_id',
        'return_location_id',
        'pickup_date',
        'return_date',
        'status',
        "cancel_reason",
        'canceled_by',
        'price',
        'discount'
    ];

    public static function TableColumns(): array
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

    //isCancelled

    public static function InfoListEntry(): array
    {
        return [
            Group::make([
                Section::make(__('Order Info'))->schema([
                    Fieldset::make(__('Identifier'))->schema([
                        PassportEntry::make('user.passport')
                            ->hiddenLabel()
                            ->columnSpanFull()
                    ])->visible(Auth::user()->type != 'user'),
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
                                TextEntry::make('user.balance')
                                    ->label('Balance')
                                    ->badge()
                                    ->color(fn($record) => $record->user->balance > 0 ? 'green' : 'red')
                                    ->icon('tabler-wallet')
                                    ->label('Balance')
                                    ->translateLabel(),
                            ])
                        ]),
                    Fieldset::make(__('Order'))->schema([
                        Grid::make()->schema([
                            TextEntry::make('pickup_date')
                                ->dateTime('Y-m-d')
                                ->label('Pickup Date')
                                ->translateLabel(),
                            TextEntry::make('return_date')
                                ->dateTime('Y-m-d')
                                ->label('Return Date')
                                ->translateLabel(),
                            TextEntry::make('pickupLocation.name')
                                ->icon('tabler-location')
                                ->iconColor('blue')
                                ->iconPosition('after')
                                ->url(fn($record) => $record->pickupLocation->url)
                                ->openUrlInNewTab()
                                ->label('Pickup Location')
                                ->translateLabel(),
                            TextEntry::make('returnLocation.name')
                                ->icon('tabler-location')
                                ->iconColor('blue')
                                ->iconPosition('after')
                                ->url(fn($record) => $record->returnLocation->url)
                                ->openUrlInNewTab()
                                ->label('Return Location')
                                ->translateLabel(),
                            TextEntry::make('days_booked')
                                ->badge()
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
                    ShowPrice::make('price')
                        ->hiddenLabel()
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

    //canceled by , the customer or the admin

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isCancelled(): bool
    {
        return $this->status == 'Cancelled';
    }

    public function canceledBy(): string
    {
        return $this->canceled_by == auth()->id() ? __('Admin') : __('Customer');
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    //location


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

    public function Confirmed(): void
    {
        try {
            //check if there is discount
            $discount = $this->discount;
            $price = $this->price;
            $price = $price - ($price * $discount / 100);

            $price = $price * $this->days_booked;
            $this->user->withdraw($price);
            // If withdrawal succeeds, update order status to 'Confirmed'
            $this->update([
                'status' => 'Confirmed'
            ]);
        } catch (\Exception $e) {
            // If withdrawal fails (insufficient balance), update order status to 'Cancelled'
            $this->update([
                'status' => 'Cancelled',
                'cancel_reason' => 'Insufficient balance',
                'canceled_by' => auth()->id()
            ]);
        }
    }

    public function Active(): void
    {
        $this->update([
            'status' => 'Active'
        ]);
    }

    //Inprogress

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

    //Completed

    public function getDaysBookedAttribute()
    {
        return Carbon::parse($this->pickup_date)->diffInDays(Carbon::parse($this->return_date)) + 1;
    }

    public function Cancelled($reason): void
    {
        $this->update([
            'status' => 'Cancelled',
            'cancel_reason' => $reason,
            'canceled_by' => auth()->id()
        ]);
    }

    //Cancelled

    protected function casts(): array
    {
        return [
            'pickup_date' => 'datetime',
            'return_date' => 'datetime',
        ];
    }

}
