<?php

namespace App\Models;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'branch_id',
        'user_id',
        'answer',
    ];


    //branch name

    public static function InfoList(): array
    {
        return [
            // Section for basic information
            Section::make(__('Basic Information'))->columns(3)->schema([
                TextEntry::make('name')
                    ->label(__('Name'))
                    ->translateLabel(),

                TextEntry::make('email')
                    ->label(__('Email'))
                    ->translateLabel(),

                TextEntry::make('phone')
                    ->label(__('Phone'))
                    ->translateLabel(),
            ]),

            // Section for message and answer
            Section::make(__('Details'))->columns(1)->schema([
                TextEntry::make('message')
                    ->label(__('Message'))
                    ->translateLabel()
                    ->markdown()
                    ->size(TextEntry\TextEntrySize::Large),

                TextEntry::make('answer')
                    ->label(__('Answer'))
                    ->translateLabel()
                    ->markdown()
                    ->visible(fn($record) => !is_null($record->answer)),
            ]),

            // Section for branch information
            Section::make(__('Branch Information'))->columns(3)->schema([
                TextEntry::make('branch_name')
                    ->label(__('Branch Name'))
                    ->translateLabel(),
                //branch.country
                TextEntry::make('branch.country')
                    ->label(__('Country'))
                    ->translateLabel()
                    ->visible(fn($record) => Auth::user()->isUser()),
                TextEntry::make('branch.city')
                    ->label(__('City'))
                    ->translateLabel()
                    ->visible(fn($record) => Auth::user()->isUser()),


                TextEntry::make('branch_manager')
                    ->label(__('Branch Manager'))
                    ->translateLabel()
                    ->visible(fn($record) => Auth::user()->isAdmin()),

                //branch manager phone
                TextEntry::make('branch.manager.phone')
                    ->label(__('Branch Manager Phone'))
                    ->translateLabel()
                    ->visible(fn($record) => Auth::user()->isAdmin()),
            ])->visible(fn(Message $record) => $record->CanBeAnswered() && (Auth::user()->isAdmin() || Auth::user()->isUser())),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //branch manager

    public function CanBeAnswered(): bool
    {
        return !is_null($this->user_id);
    }

    //user

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    //username

    public function getBranchNameAttribute()
    {
        return $this->branch?->name;
    }

    public function getBranchManagerAttribute()
    {
        return $this->branch?->manager->name;
    }

    //can be answered boolean

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

}
