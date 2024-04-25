<?php

namespace App\Filament\Resources\GasBillRecordResource\Pages;

use App\Filament\Resources\GasBillRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGasBillRecords extends ManageRecords
{
    protected static string $resource = GasBillRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
