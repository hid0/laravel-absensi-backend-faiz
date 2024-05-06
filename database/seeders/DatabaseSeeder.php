<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(19)->create();

        User::factory()->create([
            'id' => uuid_create(),
            'name' => 'Faiz Hidayatulloh',
            'email' => 'faiz@fic16.com',
            'password' => Hash::make('orakreti'),
        ]);
    }
}
