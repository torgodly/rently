<?php

namespace App\Livewire;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;

class MyCustomPersonalInfoProfileComponent extends PersonalInfo
{
    public array $only = ['name', 'email', 'phone'];


    protected function getProfileFormSchema(): array
    {
        $groupFields = Group::make([
            $this->getNameComponent(),
            $this->getPhoneComponent(),
            $this->getEmailComponent(),
        ])->columnSpan(2);

        return ($this->hasAvatars)
            ? [filament('filament-breezy')->getAvatarUploadComponent(), $groupFields]
            : [$groupFields];
    }

    //getPhoneComponent
    protected function getPhoneComponent(): TextInput
    {
        return TextInput::make('phone')
            ->required()
            ->label(__('Phone'));
    }


}
