<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::create(['name' => 'Ghana Police Service']);
        Agency::create(['name' => 'Ghana National Fire Service']);
        Agency::create(['name' => 'Ghana Ambulance Service']);
        Agency::create(['name' => 'NADMO']);
    }
}
