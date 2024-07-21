<?php

namespace App\Livewire;

use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;

class MyCustomProfile extends MyProfileComponent
{
//    public function render()
//    {
//        return view('livewire.my-custom-profile');
//    }

    public array $only = ['passport'];
    public array $data;
    public $user;
    public $userClass;
    protected string $view = "livewire.my-custom-profile";

    // this example shows an additional field we want to capture and save on the user

    public function mount()
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();
        $this->userClass = get_class($this->user);

        $this->form->fill($this->user->only($this->only));
    }

    public function form(Form $form): Form
    {
        return $form
            ->disabled($this->user->isVerified())
            ->schema([
                FileUpload::make('passport')
                    ->translateLabel()
                    ->required()
            ])
            ->statePath('data');
    }

    // only capture the custome component field
    public function submit(): void
    {
        $data = collect($this->form->getState())->only($this->only)->all();
        $this->user->update($data);
        Notification::make()
            ->success()
            ->title(__('ID Has Been Sent'))
            ->body(__('Your ID has been successfully sent to the admin waiting For Confirmation.'))
            ->send();
    }
}
