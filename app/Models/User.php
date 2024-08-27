<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Notifications\Notification;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

class User extends Authenticatable implements HasAvatar, FilamentUser, MustVerifyEmail
{
    use  HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'passport',
        'id_verified',
        'password',
        'balance',
        'avatar_url',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->type === 'admin';
        }

        if ($panel->getId() === 'office') {
            return $this->type === 'manager';
        }

        if ($panel->getId() === 'user') {
            return $this->type === 'user';
        }
        return false;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }

    public function branch()
    {
        return $this->hasOne(Branch::class, 'manager_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

//is admin
    public function isAdmin()
    {
        return $this->type == 'admin';
    }

    //is manager
    public function isManager()
    {
        return $this->type == 'manager';
    }

    //is user
    public function isUser()
    {
        return $this->type == 'user';
    }

    /**
     * @throws \Exception
     */
    public function withdraw($amount)
    {
        if ($this->balance < $amount) {
            throw new \RuntimeException('Insufficient balance.'); // Throw an exception if there's insufficient balance
        }
        $this->balance -= $amount;
        $this->save();
    }

    //withdraw

    public function getBalanceWithSymbolAttribute()
    {
        //get local
        $local = app()->getLocale();

        if ($local == 'ar') {
            return 'د.ل ' . number_format($this->balance,);
        } else {
            return 'LYD ' . number_format($this->balance,);
        }
    }


    //user balance with currency symbol د.ل or LYD based on local

    public function hasBalance($amount): bool
    {
        return $this->balance >= $amount;
    }


    //has balance

    public function isVerified(): bool
    {
        return $this->id_verified;
    }

    //redeem voucher

    //isVerified

    public function scopeNeedVerification($query)
    {
        return $query->where('id_verified', false)->whereNotNull('passport')->where('type', 'user');
    }

    //scope need verification

    public function verify()
    {
        $this->id_verified = true;
        $this->save();
        Notification::make()
            ->success()
            ->icon('heroicon-o-check-circle')
            ->title(__('ID Verified'))
            ->body(__('Your ID has been verified'))
            ->sendToDatabase($this);
        Notification::make()
            ->success()
            ->icon('heroicon-o-check-circle')
            ->title(__('ID Verified'))
            ->body(__('The user ID has been verified'))
            ->send();
    }

    //confirm Id

    public function decline()
    {
        $this->id_verified = false;
        $this->passport = null;
        $this->save();

        Notification::make()
            ->danger()
            ->icon('heroicon-o-x-circle')
            ->title(__('ID Declined'))
            ->body(__('Your ID has been declined'))
            ->sendToDatabase($this);
        Notification::make()
            ->danger()
            ->icon('heroicon-o-x-circle')
            ->icon('heroicon-o-x-circle')
            ->title(__('ID Declined'))
            ->body(__('The user ID has been declined'))
            ->send();
    }

    //decline Id

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
