<?php

namespace Database\Factories;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Permission::class;

    public function definition(): array
    {
        $user = User::where('name', 'Faiz Hidayatulloh')->first();
        return [
            'user_id' => $user->id,
            'date_permission' => $this->faker->date(),
            'reason' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
