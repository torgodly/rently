<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use function Laravel\Prompts\error;

class User extends Authenticatable implements  HasAvatar
{
    use  HasFactory, Notifiable, TwoFactorAuthenticatable;

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url($this->avatar_url) : null ;
    }

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


    //user balance with currency symbol د.ل or LYD based on local
    public function getBalanceWithSymbolAttribute()
    {
        //get local
        $local = app()->getLocale();

        if ($local == 'ar') {
            return 'د.ل ' . number_format($this->balance, );
        } else {
            return 'LYD ' . number_format($this->balance, );
        }
    }


    //has balance
    public function hasBalance($amount): bool
    {
        return $this->balance >= $amount;
    }

    //redeem voucher

}
