<?php

namespace App\Filament\Resources\ElectricityBillRecordResource\Pages;

use App\Filament\Resources\ElectricityBillRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageElectricityBillRecords extends ManageRecords
{
    protected static string $resource = ElectricityBillRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
