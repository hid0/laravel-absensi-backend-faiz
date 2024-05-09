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

        \App\Models\Company::create([
            'name' => 'PT. Pencari Cinta Sejati',
            'email' => 'admin@fic16.com',
            'address' => 'Jl. Jejer Kauman No 2, Pecangaan Jepara',
            'latitude' => '-6.6905064492538395',
            'longitude' => '110.70600715918275',
            'radius_km' => '0.5',
            'time_in' => '07.10',
            'time_out' => '13.10'
        ]);
    }
}
