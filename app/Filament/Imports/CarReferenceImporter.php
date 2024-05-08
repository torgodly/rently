<?php

namespace App\Filament\Imports;

use App\Models\CarReference;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CarReferenceImporter extends Importer
{
    protected static ?string $model = CarReference::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('make')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('model')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('year')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('body_style')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?CarReference
    {
        // return CarReference::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new CarReference();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your car reference import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
