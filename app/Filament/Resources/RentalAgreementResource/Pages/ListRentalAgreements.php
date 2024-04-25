<?php

namespace App\Filament\Resources\RentalAgreementResource\Pages;

use App\Filament\Resources\RentalAgreementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentalAgreements extends ListRecords
{
    protected static string $resource = RentalAgreementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
