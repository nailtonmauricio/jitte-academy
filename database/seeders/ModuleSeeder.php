<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Module::where('id', 1)->exists()) {
            Module::create([
                'course_id' => 1,
                'title' => 'Criando .README com Markdown',
                'summary' => 'Neste curso iremos nos aprofundar na simples, mas poderosa linguagem de estilização de textos para web mais utilizada para criação de documentação de API`s e sistemas já conhecida.',
            ]);
        }

        if (!Module::where('id', 2)->exists()) {
            Module::create([
                'course_id' => 2,
                'title' => 'Explorando expressões regulares',
                'summary' => 'As expressões regulares são muito poderosas e utilizadas em diversas linguagens de programação, como JavaScript, PHP, Python, entre outras.',
            ]);
        }
    }
}
