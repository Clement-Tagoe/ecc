<?php

namespace Database\Seeders;

use App\Models\EmergencyCase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmergencyCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmergencyCase::create([
            'reporting_time' => '12:46:00',
            'reporting_date' => '2025-08-12',
            'agency_id' => 1,
            'region_id' => 2,
            'location' => 'Sakumono',
            'contact' => '0244057783',
            'description' => 'The caller is a nurse at sakumono community hospital and wants an ambulance to transfer patient to sonotech tema.',
            'action_taken' => 'Ambulance command center',
            'feedback' => 'No feedback',
            'user_id' => 1,
            'created_by' => 'Myles Munroe'
        ]);

        EmergencyCase::create([
            'reporting_time' => '09:30:00',
            'reporting_date' => '2025-08-10',
            'agency_id' => 2,
            'region_id' => 2,
            'location' => 'Ridge',
            'contact' => '0203494955',
            'description' => 'The caller is a doctor at 37 military hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
            'action_taken' => 'Ambulance command center',
            'feedback' => 'No feedback',
            'user_id' => 1,
            'created_by' => 'Patricia Turkson'
        ]);

        EmergencyCase::create([
            'reporting_time' => '07:00:00',
            'reporting_date' => '2025-08-12',
            'agency_id' => 2,
            'region_id' => 2,
            'location' => 'Ridge',
            'contact' => '0203494955',
            'description' => 'The caller is a doctor at Tema General Hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
            'action_taken' => 'Ambulance command center',
            'feedback' => 'No feedback',
            'user_id' => 1,
            'created_by' => 'Patricia Turkson'
        ]);

    //     EmergencyCase::create([
    //         'reporting_time' => '18:17:00',
    //         'reporting_date' => '2025-08-11',
    //         'agency_id' => 3,
    //         'region_id' => 6,
    //         'location' => 'Hohoe',
    //         'contact' => '0249495554',
    //         'description' => 'The caller is a doctor at Tema General Hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
    //         'action_taken' => 'Ambulance command center',
    //         'feedback' => 'No feedback',
    //         'user_id' => 2,
    //         'created_by' => 'Myles Munroe'
    //     ]);


    //     EmergencyCase::create([
    //         'reporting_time' => '07:00:00',
    //         'reporting_date' => '2025-08-12',
    //         'agency_id' => 2,
    //         'region_id' => 2,
    //         'location' => 'Ridge',
    //         'contact' => '0203494955',
    //         'description' => 'The caller is a doctor at Tema General Hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
    //         'action_taken' => 'Ambulance command center',
    //         'feedback' => 'No feedback',
    //         'user_id' => 3,
    //         'created_by' => 'Patricia Turkson'
    //     ]);

    //     EmergencyCase::create([
    //         'reporting_time' => '08:13:00',
    //         'reporting_date' => '2025-08-12',
    //         'agency_id' => 2,
    //         'region_id' => 2,
    //         'location' => 'Teshie',
    //         'contact' => '0203494955',
    //         'description' => 'The caller is a doctor at Tema General Hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
    //         'action_taken' => 'Ambulance command center',
    //         'feedback' => 'No feedback',
    //         'user_id' => 3,
    //         'created_by' => 'Patricia Turkson'
    //     ]);

    //     EmergencyCase::create([
    //         'reporting_time' => '13:40:00',
    //         'reporting_date' => '2025-08-04',
    //         'agency_id' => 2,
    //         'region_id' => 2,
    //         'location' => 'Ridge',
    //         'contact' => '0243494955',
    //         'description' => 'The caller is a doctor at Tema General Hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
    //         'action_taken' => 'Ambulance command center',
    //         'feedback' => 'No feedback',
    //         'user_id' => 3,
    //         'created_by' => 'Patricia Turkson'
    //     ]);

    //     EmergencyCase::create([
    //         'reporting_time' => '10:20:00',
    //         'reporting_date' => '2025-08-11',
    //         'agency_id' => 1,
    //         'region_id' => 4,
    //         'location' => 'Cape Coast',
    //         'contact' => '0202098605',
    //         'description' => 'The caller is a doctor at Tema General Hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
    //         'action_taken' => 'Police command center',
    //         'feedback' => 'No feedback',
    //         'user_id' => 2,
    //         'created_by' => 'Myles Munroe'
    //     ]);

    //     EmergencyCase::create([
    //         'reporting_time' => '17:34:00',
    //         'reporting_date' => '2025-08-08',
    //         'agency_id' => 4,
    //         'region_id' => 5,
    //         'location' => 'Koforidua',
    //         'contact' => '0243887612',
    //         'description' => 'The caller is a doctor at Tema General Hospital and wants an ambulance to transfer patient to sonotech ridge hospital.',
    //         'action_taken' => 'NADMO command center',
    //         'feedback' => 'No feedback',
    //         'user_id' => 3,
    //         'created_by' => 'Patricia Turkson'
    //     ]);
    }
}
