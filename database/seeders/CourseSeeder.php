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

        if (!Course::where('id', 2)->exists()) {
            Course::create([
                'name' => 'Regex',
                'description' => 'Regex, ou expressões regulares (do inglês, regular expressions), são sequências de caracteres que formam um padrão de busca. Elas são usadas para encontrar, validar, substituir ou manipular textos de maneira eficiente em strings, baseando-se em padrões predefinidos.
As expressões regulares permitem que você faça coisas como:
    Procurar por padrões específicos dentro de um texto (como números, datas ou e-mails).
    Validar se uma string segue um formato específico (por exemplo, se uma senha tem pelo menos 8 caracteres, contém uma letra maiúscula, um número, etc.).
    Substituir parte de um texto baseado em um padrão.',
                'subcategory_id' => 1,
                'card'=> 'https://via.placeholder.com/640x480.png/00ccbb?text=Regex',
                'duration'=> '01:36:00',
                'price' => 00.00,
            ]);
        }

        if (!Course::where('id', 3)->exists()) {
            Course::create([
                'name' => 'HTTP, Status e Métodos',
                'description' => 'Como utilizar de foma correta o protocolo HTTP para aplicar seus status e métodos no desenvolvimento.',
                'subcategory_id' => 1,
                'card' => 'https://via.placeholder.com/640x480.png/99ccaa?text=HTTP, Status e Métodos',
                'duration' => '00:40:00',
                'price' => 00.00,
            ]);
        }

        //Course::factory(8)->create();
    }
}
