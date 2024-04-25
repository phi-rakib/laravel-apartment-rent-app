<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricityBillRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'per_unit_cost',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
