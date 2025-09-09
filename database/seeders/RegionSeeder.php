<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create(['name' => 'Greater Accra']);
        Region::create(['name' => 'Ashanti']);
        Region::create(['name' => 'Western']);
        Region::create(['name' => 'Central']);
        Region::create(['name' => 'Eastern']);
        Region::create(['name' => 'Volta']);
        Region::create(['name' => 'Northern']);
        Region::create(['name' => 'Upper East']);
        Region::create(['name' => 'Upper West']);
        Region::create(['name' => 'Bono']);
        Region::create(['name' => 'Bono East']);
        Region::create(['name' => 'Ahafo']);
        Region::create(['name' => 'Savannah']);
        Region::create(['name' => 'North East']);
        Region::create(['name' => 'Oti']);
        Region::create(['name' => 'Western North']);
    }
}
