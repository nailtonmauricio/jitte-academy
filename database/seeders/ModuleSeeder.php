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

        /** Modulos do curso CFAQ-MOM/MOC, disciplina Lingua Portuguesa */

        if (!Module::where('id', 9)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Substantivos',
                'summary' => 'Classificação, formação e flexão',
                'order' => 1,
            ]);
        }

        if (!Module::where('id', 10)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Adjetivos',
                'summary' => 'Formação, pátrios e locução adjetiva',
                'order' => 2,
            ]);
        }

        if (!Module::where('id', 11)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Verbos',
                'summary' => 'Flexionar nos modos indicativo, sub-
juntivo e imperativo',
                'order' => 3,
            ]);
        }

        if (!Module::where('id', 12)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Pronomes',
                'summary' => 'Pessoal, possessivo, demonstrativo,
indefinido e interrogativo',
                'order' => 4,
            ]);
        }

        if (!Module::where('id', 13)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Advérbios',
                'summary' => 'Locuções adverbiais',
                'order' => 5,
            ]);
        }

        if (!Module::where('id', 14)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Artigos',
                'summary' => 'Definidos e indefinidos',
                'order' => 6,
            ]);
        }

        if (!Module::where('id', 15)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Numerais',
                'summary' => 'Cardinais, ordinais, multiplicativos e
fracionários',
                'order' => 7,
            ]);
        }

        if (!Module::where('id', 16)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Preposições',
                'summary' => 'Uso e outras coisas',
                'order' => 8,
            ]);
        }

        if (!Module::where('id', 17)->exists()) {
            Module::create([
                'course_id' => 4,
                'title' => 'Conjunções e Interjeições',
                'summary' => 'Uso e outras coisas',
                'order' => 9,
            ]);
        }

        /** Modulos do curso CFAQ-MOM/MOC, disciplina Matematica */
        if (!Module::where('id', 18)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Conjuntos',
                'summary' => 'Uso e outras coisas',
                'order' => 1,
            ]);
        }

        if (!Module::where('id', 19)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Escalas de medidas de temperatura',
                'summary' => 'Uso e outras coisas',
                'order' => 2,
            ]);
        }

        if (!Module::where('id', 20)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Numeros naturais',
                'summary' => 'Uso e outras coisas',
                'order' => 3,
            ]);
        }

        if (!Module::where('id', 21)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Numeros decimais',
                'summary' => 'Uso e outras coisas',
                'order' => 4,
            ]);
        }

        if (!Module::where('id', 22)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Numeros decimais',
                'summary' => 'Uso e outras coisas',
                'order' => 5,
            ]);
        }

        if (!Module::where('id', 23)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Numeros negativos e positivos',
                'summary' => 'Uso e outras coisas',
                'order' => 6,
            ]);
        }

        if (!Module::where('id', 24)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Fraçoes',
                'summary' => 'Uso e outras coisas',
                'order' => 7,
            ]);
        }

        if (!Module::where('id', 25)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Transformaçao de unidades de medida',
                'summary' => 'Uso e outras coisas',
                'order' => 8,
            ]);
        }

        if (!Module::where('id', 26)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Geometria',
                'summary' => 'Uso e outras coisas',
                'order' => 9,
            ]);
        }

        if (!Module::where('id', 27)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Potencia e radiciaçao',
                'summary' => 'Uso e outras coisas',
                'order' => 10,
            ]);
        }

        if (!Module::where('id', 28)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Equaçao de 1 e 2 grau',
                'summary' => 'Uso e outras coisas',
                'order' => 11,
            ]);
        }

        if (!Module::where('id', 29)->exists()) {
            Module::create([
                'course_id' => 5,
                'title' => 'Porcentagem',
                'summary' => 'Uso e outras coisas',
                'order' => 12,
            ]);
        }
    }
}
