<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Gera um usuário automaticamente
            'name' => $this->faker->name(),
            'contact' => $this->faker->phoneNumber(),
            'registration' => $this->faker->unique()->numerify('2024######'), // Gera um número único
        ];
    }
}
