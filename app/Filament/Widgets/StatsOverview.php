<?php

namespace App\Filament\Widgets;

use App\Models\ElectricityBillRecord;
use App\Models\GasBillRecord;
use App\Models\Payment;
use App\Models\RentalAgreement;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Rental Agreements', RentalAgreement::count()),
            Stat::make('Total Paid Amount', Payment::sum('total') . 'Tk'),
            Stat::make('Electricity Per Unit Cost', ElectricityBillRecord::latest()->first()->value('per_unit_cost') . 'Tk'),
            Stat::make('Gas Bill: Single Stove', GasBillRecord::latest()->where('type', 'single_stove')->value('amount') . 'Tk'),
            Stat::make('Gas Bill: Double Stove', GasBillRecord::latest()->where('type', 'double_stove')->value('amount') . 'Tk'),
        ];
    }
}
