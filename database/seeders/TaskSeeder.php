<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'date' => '2025-08-08',
            'time' => '14:34:00',
            'shift' => 'Day',
            'observation' => 'Through my observation, many places are still having sanitation issues in the region mentioned above. Plastic waste is teh majoe cause of poor sanitation in Ashanti Region. Surveillance revealed that the affected areas are caused by inadequate waste disposal: that is indiscipline and insufficient waste materials.',
            'region_id' => '2',
            'user_id' => '2',
            'location' => 'Adum',
            'camera name(s)' => 'Adum_Junc_1B2, Abatoir_Kraah_Gate_1B2',
            'topic' => 'Sanitation',
            'recommendation' => 'Provide Dustbins in crowded areas.',
            'created_by' => 'Myles Munroe'
        ]);
    }
}
