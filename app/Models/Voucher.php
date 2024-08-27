<?php

namespace App\Models;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\Actions\Action as ActionComponent;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'value',
        'status',
        'expiry_date',
        'user_id',
        'redeemed_at'
    ];

    public static function tableColumns(): array
    {
        return [
            TextColumn::make('code')
                ->searchable()
                ->sortable()
                ->translateLabel()
                ->copyable()
                ->copyMessage(__('Code Copied'))
                ->label('Code'),

            TextColumn::make('value')
                ->translateLabel()
                ->sortable()
                ->label('Value')
                ->badge()
                ->color('green')
                ->icon('heroicon-o-currency-dollar')
                ->suffix('د.ل'),
            TextColumn::make('status')
                ->translateLabel()
                ->sortable()
                ->label('Status')
                ->badge()
                ->color(fn($record) => $record->status === 'active' ? 'green' : 'red')
                ->icon('tabler-clipboard-check'),

            TextColumn::make('expiry_date')
                ->translateLabel()
                ->sortable()
                ->label('Expiry Date')
                ->date('Y-m-d h:i')
                ->icon('tabler-calendar-event'),

            TextColumn::make('redeemed_at')
                ->translateLabel()
                ->sortable()
                ->label('Redeemed At')
                ->date('Y-m-d h:i')
                ->placeholder('N/A')
                ->icon('tabler-calendar-event'),

            TextColumn::make('user.name')
                ->translateLabel()
                ->sortable()
                ->label('User')
                ->icon('tabler-user')
                ->searchable()
                ->default('N/A')


        ];
    }

    public static function generateAction(): Action
    {
        return Action::make('generate')
            ->label('Generate Voucher')
            ->translateLabel()
            ->requiresConfirmation()
            ->form([
                TextInput::make('code')
                    ->label('Code')
                    ->translateLabel()
                    ->placeholder(__("Enter the code Or Press Generate to generate a random code"))
                    ->required()
                    ->unique('vouchers', 'code')
                    ->prefixIcon('heroicon-o-key')
                    ->hintAction(ActionComponent::make('generate')->label('Generate Code')->translateLabel()->action(fn(Set $set) => $set('code', generateVoucherCode(8)))),

                TextInput::make('value')
                    ->label('Value')
                    ->translateLabel()
                    ->placeholder(__('Enter the value'))
                    ->required()
                    ->prefixIcon('heroicon-o-currency-dollar')
                    ->hint(__('Enter the value of the voucher')),
                    
                DateTimePicker::make('expiry_date')
                    ->label('Expiry Date')
                    ->translateLabel()
                    ->placeholder(__("Enter the expiry date"))
                    ->required()
                    ->prefixIcon('tabler-calendar-event')
                    ->native(false)
                    ->format('Y-m-d')
                    ->minDate(Carbon::now()->addDay())
                    ->seconds(false)
                    ->hint(__("Enter the expiry date of the voucher")),
            ])
            ->action(function (array $data) {
                Voucher::create($data);

            })
            ->modalIcon('heroicon-o-ticket')
            ->modalDescription();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //check if the voucher is expired or has been redeemed
    public function isExpired(): bool
    {
        return $this->expiry_date < now();
    }

    public function isRedeemed(): bool
    {
        return $this->user_id != null;
    }

    //user redeemes the voucher
    public function redeem($user)
    {
        $this->update([
            'status' => 'inactive',
            'user_id' => $user->id,
            'redeemed_at' => now()
        ]);

        $user->update([
            'balance' => $user->balance + $this->value
        ]);
    }
}
