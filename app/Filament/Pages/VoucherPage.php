<?php

namespace App\Filament\Pages;

use App\Models\Voucher;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class VoucherPage extends Page implements HasTable, HasActions, HasForms
{

    use InteractsWithTable;
    use InteractsWithActions;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'tabler-ticket';

    protected static string $view = 'filament.pages.voucher-page';

    public static function getNavigationGroup(): ?string
    {
        return __('Management');
    }
    public static function getNavigationLabel(): string
    {
        return __('Vouchers');
    }

    public function getTitle(): string|Htmlable
    {
        return __('Vouchers');
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(Voucher::query())
            ->columns(Voucher::tableColumns());
    }

    public function generateAction(): Action
    {
        return Voucher::generateAction();
    }


}
