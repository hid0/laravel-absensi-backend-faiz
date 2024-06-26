<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
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
            'user_id' => $user->id,
            'title' => $this->faker->jobTitle(),
            'content' => $this->faker->text()
        ];
    }
}
