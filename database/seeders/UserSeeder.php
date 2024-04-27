<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = ['Jhuma', 'Sumaiya', 'Nishi'];

        foreach ($tenants as $tenant) {
            User::create([
                'name' => $tenant,
                'email' => $tenant . '@gmail.com',
                'password' => $tenant,
                'phone' => '0178719878',
            ]);
        }
    }
}
