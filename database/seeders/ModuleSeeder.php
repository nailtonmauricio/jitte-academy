<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\AssignOp\Mod;

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
                'order' => 1,
            ]);
        }

        if (!Module::where('id', 2)->exists()) {
            Module::create([
                'course_id' => 2,
                'title' => 'Explorando expressões regulares',
                'summary' => 'As expressões regulares são muito poderosas e utilizadas em diversas linguagens de programação, como JavaScript, PHP, Python, entre outras.',
                'order' => 1,
            ]);
        }

        if (!Module::where('id', 3)->exists()) {
            Module::create([
                'course_id' => 3,
                'title' => 'Métodos HTTP: quando e onde usar cada um deles',
                'summary' => 'No vídeo de hoje vamos aprender a diferença entre alguns métodos do protocolo HTTP e vamos ver quando e onde usar cada um deles.',
                'order' => 1,
            ]);
        }

        if (!Module::where('id', 4)->exists()) {
            Module::create([
                'course_id' => 3,
                'title' => 'Status HTTP: quando e onde usar cada um deles',
                'summary' => 'No vídeo de hoje vamos conhecer os grupos de status do protocolo HTTP e vamos ver quando e onde usar cada um deles.',
                'order' => 2,
            ]);
        }

        if (!Module::where('id', 5)->exists()) {
            Module::create([
               'course_id' => 1,
               'title' => 'Avaliação Final',
               'summary' => 'Agora está na hora de por a prova o conhecimento adquirido durante sua jornada. A avaliação consiste em 20 questões de múltipla escolha
               com uma duração máxima de 100 minutos.',
                'order' => 2,
            ]);
        }

        if (!Module::where('id', 6)->exists()) {
            Module::create([
                'course_id' => 2,
               'title' => 'Avaliação Final',
               'summary' => 'Agora está na hora de por a prova o conhecimento adquirido durante sua jornada. A avaliação consiste em 20 questões de múltipla escolha
               com uma duração máxima de 100 minutos.',
                'order' => 3,
            ]);
        }

        if (!Module::where('id', 7)->exists()) {
            Module::create([
                'course_id' => 3,
               'title' => 'Avaliação Final',
               'summary' => 'É chegada a hora de por a prova o conhecimento adquirido durante sua jornada. A avaliação consiste em 20 questões de múltipla escolha
               com uma duração máxima de 100 minutos.',
                'order' => 2,
            ]);
        }

        if (!Module::where('id', 8)->exists()) {
            Module::create([
                'course_id' => 2,
                'title' => 'Exercícios',
                'summary' => 'É chegada a hora de por a prova o conhecimento adquirido durante sua jornada. A avaliação consiste em 20 questões de múltipla escolha
               com uma duração máxima de 100 minutos.',
                'order' => 2,
            ]);
        }
    }
}
