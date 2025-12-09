<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Question::where('id', 1)->exists()) {
            Question::create([
                'question_text' => 'Qual é o símbolo usado para criar uma lista não ordenada em Markdown?',
                'quiz_id' => 1,
            ]);
        }
        if (!Question::where('id', 2)->exists()) {
            Question::create([
                'question_text' => 'Como você pode criar um link em Markdown que leva ao site "https://example.com" com o texto "Clique aqui"?',
                'quiz_id' => 1,
            ]);
        }
        if (!Question::where('id', 3)->exists()) {
            Question::create([
                'question_text' => 'Qual é o resultado de colocar três asteriscos (***) em uma linha?',
                'quiz_id' => 1,
            ]);
        }
        if (!Question::where('id', 4)->exists()) {
            Question::create([
                'question_text' => 'Em Markdown, como se cria um cabeçalho de nível 3?',
                'quiz_id' => 1,
            ]);
        }

        if (!Question::where('id', 5)->exists()) {
            Question::create([
                'question_text' => 'Qual símbolo é usado para indicar o início de uma linha em uma expressão regular?',
                'quiz_id' => 2,
            ]);
        }
        if (!Question::where('id', 6)->exists()) {
            Question::create([
                'question_text' => 'Qual metacaractere é usado para corresponder a qualquer caractere único, exceto uma nova linha, em uma expressão regular?',
                'quiz_id' => 2,
            ]);
        }
        if (!Question::where('id', 7)->exists()) {
            Question::create([
                'question_text' => 'Em uma regex, como você representa um ou mais caracteres alfanuméricos?',
                'quiz_id' => 2,
            ]);
        }
        if (!Question::where('id', 8)->exists()) {
            Question::create([
                'question_text' => 'Qual símbolo é usado para definir uma sequência de alternativas em uma regex, como "cachorro" ou "gato"?',
                'quiz_id' => 2,
            ]);
        }

        if (!Question::where('id', 9)->exists()) {
            Question::create([
                'question_text' => 'Qual das alternativas abaixo descreve corretamente o protocolo HTTPS?',
                'quiz_id' => 3,
            ]);
        }
        if (!Question::where('id', 10)->exists()) {
            Question::create([
                'question_text' => 'Qual código de status HTTP indica que o recurso foi movido permanentemente para uma nova URL?',
                'quiz_id' => 3,
            ]);
        }
        if (!Question::where('id', 11)->exists()) {
            Question::create([
                'question_text' => 'Qual dos métodos HTTP a seguir é utilizado principalmente para enviar dados ao servidor para criação ou atualização de um recurso?',
                'quiz_id' => 3,
            ]);
        }
        if (!Question::where('id', 12)->exists()) {
            Question::create([
                'question_text' => 'Qual código de status HTTP indica que o cliente não possui permissão para acessar o recurso solicitado?',
                'quiz_id' => 3,
            ]);
        }
    }
}
