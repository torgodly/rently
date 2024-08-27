<?php

namespace App\Filament\User\Pages;

use App\Models\About;
use App\Models\Voucher;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Auth;

class RedeemPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'tabler-ticket';

    protected static string $view = 'filament.user.pages.redeem-page';
    protected static ?int $navigationSort = 1;
    public static function getNavigationGroup(): ?string
    {
        return __('App');
    }

    public static function getNavigationLabel(): string
    {
        return __('Redeem Voucher');
    }

    public $data;


    public function mount(): void
    {
        $this->data = Voucher::class;
        $this->form->fill([]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->hiddenLabel()
                    ->translateLabel()
                    ->placeholder(__('Enter your code'))
                    ->exists('vouchers', 'code')
                    ->required()
            ])
            ->model(Voucher::class)
            ->statePath('data');
    }

    public function save(): void
    {
//        dd('gi');
        try {
            $data = $this->form->getState();
            $voucher = Voucher::where('code', $data['code'])->first();
            if ($voucher->isRedeemed()) {
                Notification::make()
                    ->title(__('This code has already been redeemed.'))
                    ->icon('tabler-alert-triangle')
                    ->iconColor('danger')
                    ->send();
                return;
            }

            if ($voucher->isExpired()) {
                Notification::make()
                    ->title(__('This code has expired.'))
                    ->icon('tabler-alert-triangle')
                    ->iconColor('danger')
                    ->send();
                return;
            }
            $voucher->redeem(Auth::user());
            $this->form->fill([]);
        } catch (Halt $exception) {
            return;
        }

        //refresh page fully
        $this->redirect('/user/redeem-page');

        Notification::make()
            ->success()
            ->icon('tabler-check')
            ->title(__('Voucher redeemed successfully.'))
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Redeem'))
                ->submit('save'),
        ];
    }

}
