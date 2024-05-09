<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('name', 'Faiz Hidayatulloh')->first();
        return [
            // 'user_id' => uuid_create(),
            'user_id' => $user->id,
            'date' => $this->faker->date(),
            'time_in' => $this->faker->time(),
            'time_out' => $this->faker->time(),
            'latlon_in' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'latlon_out' => $this->faker->latitude() . ',' . $this->faker->longitude(),
        ];
    }
}
