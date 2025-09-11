<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Clement Tagoe',
            'email' => 'clement@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1,
        ]);

        // User::create([
        //     'name' => 'Myles Munroe',
        //     'email' => 'myles@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role_id' => 5,
        // ]);

        // User::create([
        //     'name' => 'Patricia Turkson',
        //     'email' => 'patricia@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role_id' => 5,
        // ]);
    }
}
