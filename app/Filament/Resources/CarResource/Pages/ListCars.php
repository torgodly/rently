<?php

namespace App\Filament\Resources\CarResource\Pages;

use App\Filament\Imports\CarReferenceImporter;
use App\Filament\Resources\CarResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListCars extends ListRecords
{
    protected static string $resource = CarResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
//            ImportAction::make()
//                ->importer(CarReferenceImporter::class)
//                ->label('Import Car References')
        ];
    }
}
