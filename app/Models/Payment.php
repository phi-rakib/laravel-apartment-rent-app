<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_agreement_id',
        'billing_year',
        'billing_month',
        'gas_bill',
        'total_unit',
        'electricity_bill',
        'rent',
        'total',
        'paid_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }

    public function gasBillRecord()
    {
        return $this->belongsTo(GasBillRecord::class);
    }

    public function electricityBillRecord()
    {
        return $this->belongsTo(ElectricityBillRecord::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
