<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'bedrooms',
        'bathrooms',
        'has_balcony',
        'price',
        'available',
    ];

    public function rentalAgreements()
    {
        return $this->hasMany(RentalAgreement::class);
    }
}
