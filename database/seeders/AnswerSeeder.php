<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ################ MARKDOWN ################
        // Qual é o símbolo usado para criar uma lista não ordenada em Markdown?
        if (!Answer::where('id', 1)->exists()) {
            Answer::create([
                'answer_text' => '#',
                'is_correct' => 0,
                'question_id' => 1,
            ]);
        }
        if (!Answer::where('id', 2)->exists()) {
            Answer::create([
                'answer_text' => '-',
                'is_correct' => 1,
                'question_id' => 1,
            ]);
        }
        if (!Answer::where('id', 3)->exists()) {
            Answer::create([
                'answer_text' => '*',
                'is_correct' => 0,
                'question_id' => 1,
            ]);
        }
        if (!Answer::where('id', 4)->exists()) {
            Answer::create([
                'answer_text' => '1.',
                'is_correct' => 0,
                'question_id' => 1,
            ]);
        }

        // Como você pode criar um link em Markdown que leva ao site "https://example.com" com o texto "Clique aqui"?
        if (!Answer::where('id', 5)->exists()) {
            Answer::create([
                'answer_text' => '[Clique aqui](https://example.com)',
                'is_correct' => 1,
                'question_id' => 2,
            ]);
        }
        if (!Answer::where('id', 6)->exists()) {
            Answer::create([
                'answer_text' => '[https://example.com](Clique aqui)',
                'is_correct' => 0,
                'question_id' => 2,
            ]);
        }
        if (!Answer::where('id', 7)->exists()) {
            Answer::create([
                'answer_text' => '{Clique aqui}(https://example.com)',
                'is_correct' => 0,
                'question_id' => 2,
            ]);
        }
        if (!Answer::where('id', 8)->exists()) {
            Answer::create([
                'answer_text' => '(Clique aqui)[https://example.com]',
                'is_correct' => 0,
                'question_id' => 2,
            ]);
        }

        //Qual é o resultado de colocar três asteriscos (***) em uma linha?
        if (!Answer::where('id', 9)->exists()) {
            Answer::create([
                'answer_text' => 'Cria uma linha horizontal',
                'is_correct' => 1,
                'question_id' => 3,
            ]);
        }
        if (!Answer::where('id', 10)->exists()) {
            Answer::create([
                'answer_text' => 'Inicia uma lista ordenada',
                'is_correct' => 0,
                'question_id' => 3,
            ]);
        }
        if (!Answer::where('id', 11)->exists()) {
            Answer::create([
                'answer_text' => 'Adiciona texto em negrito',
                'is_correct' => 0,
                'question_id' => 3,
            ]);
        }
        if (!Answer::where('id', 12)->exists()) {
            Answer::create([
                'answer_text' => 'Aplica negrito e itálico ao texto seguinte',
                'is_correct' => 0,
                'question_id' => 3,
            ]);
        }

        //Em Markdown, como se cria um cabeçalho de nível 3?
        if (!Answer::where('id', 13)->exists()) {
            Answer::create([
                'answer_text' => '### Cabeçalho',
                'is_correct' => 1,
                'question_id' => 4,
            ]);
        }
        if (!Answer::where('id', 14)->exists()) {
            Answer::create([
                'answer_text' => '## Cabeçalho',
                'is_correct' => 0,
                'question_id' => 4,
            ]);
        }
        if (!Answer::where('id', 15)->exists()) {
            Answer::create([
                'answer_text' => '#3 Cabeçalho',
                'is_correct' => 0,
                'question_id' => 4,
            ]);
        }
        if (!Answer::where('id', 16)->exists()) {
            Answer::create([
                'answer_text' => '#### Cabeçalho',
                'is_correct' => 0,
                'question_id' => 4,
            ]);
        }

        ################ EXPRESSÕES REGULARES ################
        // Em uma regex, como você representa um ou mais caracteres alfanuméricos?
        if (!Answer::where('id', 17)->exists()) {
            Answer::create([
                'answer_text' => '$',
                'is_correct' => 0,
                'question_id' => 5,
            ]);
        }
        if (!Answer::where('id', 18)->exists()) {
            Answer::create([
                'answer_text' => '^',
                'is_correct' => 1,
                'question_id' => 5,
            ]);
        }
        if (!Answer::where('id', 19)->exists()) {
            Answer::create([
                'answer_text' => '*',
                'is_correct' => 0,
                'question_id' => 5,
            ]);
        }
        if (!Answer::where('id', 20)->exists()) {
            Answer::create([
                'answer_text' => '.',
                'is_correct' => 0,
                'question_id' => 5,
            ]);
        }

        // Qual metacaractere é usado para corresponder a qualquer caractere único, exceto uma nova linha, em uma expressão regular?
        if (!Answer::where('id', 21)->exists()) {
            Answer::create([
                'answer_text' => '*',
                'is_correct' => 0,
                'question_id' => 6,
            ]);
        }
        if (!Answer::where('id', 22)->exists()) {
            Answer::create([
                'answer_text' => '.',
                'is_correct' => 1,
                'question_id' => 6,
            ]);
        }
        if (!Answer::where('id', 23)->exists()) {
            Answer::create([
                'answer_text' => '?',
                'is_correct' => 0,
                'question_id' => 6,
            ]);
        }
        if (!Answer::where('id', 24)->exists()) {
            Answer::create([
                'answer_text' => '+',
                'is_correct' => 0,
                'question_id' => 6,
            ]);
        }

        // Em uma regex, como você representa um ou mais caracteres alfanuméricos?
        if (!Answer::where('id', 25)->exists()) {
            Answer::create([
                'answer_text' => '[a-zA-Z0-9]+',
                'is_correct' => 1,
                'question_id' => 7,
            ]);
        }
        if (!Answer::where('id', 26)->exists()) {
            Answer::create([
                'answer_text' => '[0-9]*',
                'is_correct' => 0,
                'question_id' => 7,
            ]);
        }
        if (!Answer::where('id', 27)->exists()) {
            Answer::create([
                'answer_text' => '[a-zA-Z]*',
                'is_correct' => 0,
                'question_id' => 7,
            ]);
        }
        if (!Answer::where('id', 28)->exists()) {
            Answer::create([
                'answer_text' => '[a-zA-Z]?',
                'is_correct' => 0,
                'question_id' => 7,
            ]);
        }

        // Qual símbolo é usado para definir uma sequência de alternativas em uma regex, como "cachorro" ou "gato"?
        if (!Answer::where('id', 29)->exists()) {
            Answer::create([
                'answer_text' => '?',
                'is_correct' => 0,
                'question_id' => 8,
            ]);
        }
        if (!Answer::where('id', 30)->exists()) {
            Answer::create([
                'answer_text' => '()',
                'is_correct' => 0,
                'question_id' => 8,
            ]);
        }
        if (!Answer::where('id', 31)->exists()) {
            Answer::create([
                'answer_text' => '|',
                'is_correct' => 1,
                'question_id' => 8,
            ]);
        }
        if (!Answer::where('id', 32)->exists()) {
            Answer::create([
                'answer_text' => '[]',
                'is_correct' => 0,
                'question_id' => 8,
            ]);
        }

        ################ HTTP, MÉTODOS E STATUS ################
        // Qual das alternativas abaixo descreve corretamente o protocolo HTTPS?
        if (!Answer::where('id', 33)->exists()) {
            Answer::create([
                'answer_text' => 'HTTPS é uma versão do protocolo HTTP que utiliza a porta 80 para garantir segurança através de criptografia.',
                'is_correct' => 0,
                'question_id' => 9,
            ]);
        }
        if (!Answer::where('id', 34)->exists()) {
            Answer::create([
                'answer_text' => 'HTTPS é uma versão mais rápida do HTTP, sem qualquer tipo de criptografia.',
                'is_correct' => 0,
                'question_id' => 9,
            ]);
        }
        if (!Answer::where('id', 35)->exists()) {
            Answer::create([
                'answer_text' => 'HTTPS é uma versão segura do protocolo HTTP que usa criptografia para proteger a comunicação entre o cliente e o servidor, normalmente utilizando a porta 443.',
                'is_correct' => 1,
                'question_id' => 9,
            ]);
        }
        if (!Answer::where('id', 36)->exists()) {
            Answer::create([
                'answer_text' => 'HTTPS utiliza o protocolo FTP para transferência segura de arquivos entre o cliente e o servidor.',
                'is_correct' => 0,
                'question_id' => 9,
            ]);
        }

        // Qual código de status HTTP indica que o recurso foi movido permanentemente para uma nova URL?
        if (!Answer::where('id', 37)->exists()) {
            Answer::create([
                'answer_text' => '200',
                'is_correct' => 0,
                'question_id' => 10,
            ]);
        }
        if (!Answer::where('id', 38)->exists()) {
            Answer::create([
                'answer_text' => '301',
                'is_correct' => 1,
                'question_id' => 10,
            ]);
        }
        if (!Answer::where('id', 39)->exists()) {
            Answer::create([
                'answer_text' => '403',
                'is_correct' => 0,
                'question_id' => 10,
            ]);
        }
        if (!Answer::where('id', 40)->exists()) {
            Answer::create([
                'answer_text' => '500',
                'is_correct' => 0,
                'question_id' => 10,
            ]);
        }

        // Qual dos métodos HTTP a seguir é utilizado principalmente para enviar dados ao servidor para criação ou atualização de um recurso?
        if (!Answer::where('id', 41)->exists()) {
            Answer::create([
                'answer_text' => 'GET',
                'is_correct' => 0,
                'question_id' => 11,
            ]);
        }
        if (!Answer::where('id', 42)->exists()) {
            Answer::create([
                'answer_text' => 'POST',
                'is_correct' => 1,
                'question_id' => 11,
            ]);
        }
        if (!Answer::where('id', 43)->exists()) {
            Answer::create([
                'answer_text' => 'DELETE',
                'is_correct' => 0,
                'question_id' => 11,
            ]);
        }
        if (!Answer::where('id', 44)->exists()) {
            Answer::create([
                'answer_text' => 'OPTIONS',
                'is_correct' => 0,
                'question_id' => 11,
            ]);
        }

        // Qual código de status HTTP indica que o cliente não possui permissão para acessar o recurso solicitado?
        if (!Answer::where('id', 45)->exists()) {
            Answer::create([
                'answer_text' => '200',
                'is_correct' => 0,
                'question_id' => 12,
            ]);
        }
        if (!Answer::where('id', 46)->exists()) {
            Answer::create([
                'answer_text' => '404',
                'is_correct' => 0,
                'question_id' => 12,
            ]);
        }
        if (!Answer::where('id', 47)->exists()) {
            Answer::create([
                'answer_text' => '403',
                'is_correct' => 1,
                'question_id' => 12,
            ]);
        }
        if (!Answer::where('id', 48)->exists()) {
            Answer::create([
                'answer_text' => '503',
                'is_correct' => 0,
                'question_id' => 12,
            ]);
        }
    }
}
