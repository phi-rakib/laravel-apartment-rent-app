<?php

namespace Database\Seeders;

use App\Models\GasBillRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GasBillRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GasBillRecord::create([
            'type' => 'single_stove',
            'amount' => 980,
        ]);

        GasBillRecord::create([
            'type' => 'double_stove',
            'amount' => 1080,
        ]);
    }
}
