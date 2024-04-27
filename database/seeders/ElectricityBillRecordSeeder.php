<?php

namespace Database\Seeders;

use App\Models\ElectricityBillRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectricityBillRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ElectricityBillRecord::create(['per_unit_cost' => 6]);
    }
}
