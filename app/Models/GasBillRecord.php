<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasBillRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
