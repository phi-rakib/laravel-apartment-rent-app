<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rental_agreement_id',
        'gas_bill_record_id',
        'electricity_bill_record_id',
        'amount',
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
}
