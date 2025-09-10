<?php

namespace Database\Seeders;

use App\Models\CameraAudit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CameraAuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CameraAudit::create([
            'date' => '2025-09-08',
            'time' => '09:34:00',
            'camera_name' => 'Adum_Junc_1B2',
            'camera_status' => 'online',
            'observation' => 'camera blocked by trees',
            'user_id' => '3',
            'created_by' => 'Patricia Turkson',
        ]);
    }
}
