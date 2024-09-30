<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'subcategory_id' => Subcategory::factory(), // cria uma subcategoria associada
            'name' => $this->faker->words(3, true), // gera um nome com 3 palavras
            'description' => substr($this->faker->paragraph, 0, 255), // gera uma descrição
            'card' => $this->faker->imageUrl(), // gera uma URL para uma imagem
            'duration' => $this->faker->randomDigitNotZero(), // gera uma duração em horas
            'price' => $this->faker->randomFloat(2, 10, 1000), // gera um preço entre 10 e 1000
        ];
    }
}
