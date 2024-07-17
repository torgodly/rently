<?php

namespace App\Filament\Auth;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Register as BaseRegister;
class Register extends BaseRegister
{


    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPhoneFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }


    //phone
    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
            ->tel()
            ->required()
            ->unique('users', 'phone', ignoreRecord: true)
            ;
    }

    //terms and conditions form component
    protected function getTermsFormComponent(): Component
    {
        return Checkbox::make('accept_terms')
            ->required()
            ->label('Accept Terms and Conditions')
            ->helpMessage('You must accept the terms and conditions to register.')
            ;
    }
}
