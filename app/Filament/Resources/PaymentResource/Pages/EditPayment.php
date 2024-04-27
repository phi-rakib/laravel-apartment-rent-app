<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use App\Models\Apartment;
use App\Models\RentalAgreement;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayment extends EditRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['apartment_id'] = Apartment::where('id', RentalAgreement::where('id', $data['rental_agreement_id'])->value('apartment_id'))->value('id');
        $data['user_id'] = User::where('id', RentalAgreement::where('id', $data['rental_agreement_id'])->value('user_id'))->value('id');

        return $data;
    }
    
}
