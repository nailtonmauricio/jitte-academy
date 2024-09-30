<?php

namespace Database\Seeders;

use App\Models\Course;
use Database\Factories\CourseFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Course::where('id', 1)->exists()) {
            Course::create([
               'name' => 'Markdown',
               'description' => 'Markdown é uma linguagem de marcação leve amplamente utilizada para formatar texto na web. Ela permite adicionar formatação ao texto de forma simples, usando uma sintaxe fácil de ler e escrever.',
               'subcategory_id' => 1,
               'card'=> 'https://via.placeholder.com/640x480.png/00bbbb?text=Markdown',
               'duration'=> '00:20:00',
               'price' => 00.00,
            ]);
        }

        Course::factory(8)->create();
    }
}
