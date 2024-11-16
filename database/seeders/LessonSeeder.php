<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Lesson::where('id', 1)->exists()) {
            Lesson::create([
                'module_id' => 1,
                'title' => 'Principais estruturas de marcação',
                'summary' => 'O Markdown pode ser utilizado para criar estilos prorpios e deixar os arquivos de  Readme mais atrativos.Ele possui diversos recursos que seram abordados durante todo o treinamento, sendo eles:Títulos Os títulos são criados usando o símbolo #. O número de # indica o nível do título (de 1 a 6). Ênfase Para adicionar ênfase ao texto, você pode usar asteriscos (*) ou underscores (_): Listas Listas não ordenadas
São criadas usando -, * ou +: Listas ordenadas São criadas usando números seguidos de um ponto (.):',
                'content' => 'https://www.youtube.com/embed/Wj_1cGqy8js?si=1y4gRpt7Hmrm4TOX" title="YouTube video player"',
                'length' => '00:20:00'
            ]);
        }

        if (!Lesson::where('id', 2)->exists()) {
            Lesson::create([
                'module_id' => 2,
                'title' => 'Grupos, conjuntos e ocorrências em expressões regulares',
                'summary' => 'Hoje vamos falar sobre expressões regulares e vamos ver na prática como validar, identificar e formatar strings com elas, além de aprender passo a passo como montar expressões regulares e o que cada parte da estrutura significa.',
                'content' => 'https://www.youtube.com/embed/X8-sPWqH6AI?si=J2wELsVcAmWBGfqC title="YouTube video player"',
                'length' => '00:34:00'
            ]);
        }

        if (!Lesson::where('id', 3)->exists()) {
            Lesson::create([
                'module_id' => 2,
                'title' => 'Classes de caracteres e flags em expressões regulares',
                'summary' => 'Hoje vamos avançar no tema de expressões regulares e vamos aprender sobre classes de caracteres e flags, além de um bonus prático para o dia-a-dia hehe',
                'content' => 'https://www.youtube.com/embed/KXCacyixPwY?si=sX5C3CyTBVWi8jak title="YouTube video player"',
                'length' => '00:30:25'
            ]);
        }

        if (!Lesson::where('id', 4)->exists()) {
            Lesson::create([
                'module_id' => 2,
                'title' => 'Operador OR, acentos e grupos avançados em expressões regulares',
                'summary' => 'No vídeo de hoje vamos falar um pouco mais sobre expressões regulares e vamos aprender como criar expressões condicionais com o operador OR, validar caracteres com acento e utilizar grupos avançados.',
                'content' => 'https://www.youtube.com/embed/u0ojhxSvmrQ?si=PiX9VVj-hsdyhrOk title="YouTube video player"',
                'length' => '00:23:18'
            ]);
        }

        if (!Lesson::where('id', 5)->exists()) {
            Lesson::create([
                'module_id' => 3,
                'title' => 'Utilizando os métodos HTTP',
                'summary' => 'No vídeo de hoje vamos aprender a diferença entre alguns métodos do protocolo HTTP e vamos ver quando e onde usar cada um deles.',
                'content' => 'https://www.youtube.com/embed/wg85iKjrZUc?si=rfxB5ZLKXwZWRqFs" title="YouTube video player"',
                'length' => '00:10:52'
            ]);
        }

        if (!Lesson::where('id', 6)->exists()) {
            Lesson::create([
                'module_id' => 4,
                'title' => 'Utilizando os status HTTP',
                'summary' => 'No vídeo de hoje vamos conhecer os grupos de status do protocolo HTTP e vamos ver quando e onde usar cada um deles.',
                'content' => 'https://www.youtube.com/embed/rWIOwa-l59o?si=f53_iRtep9eMsnDK" title="YouTube video player"',
                'length' => '00:11:50'
            ]);
        }

        if (!Lesson::where('id', 7)->exists()) {
            Lesson::create([
                'module_id' => 5,
                'title' => 'Avaliação de Markdown',
                'summary' => 'No vídeo de hoje vamos conhecer os grupos de status do protocolo HTTP e vamos ver quando e onde usar cada um deles.',
                'content' => 'https://www.youtube.com/embed/rWIOwa-l59o?si=f53_iRtep9eMsnDK" title="YouTube video player"',
                'length' => '01:40:00',
                'is_exam' => true,
            ]);
        }

        if (!Lesson::where('id', 8)->exists()) {
            Lesson::create([
                'module_id' => 6,
                'title' => 'Avaliação de Regex',
                'summary' => 'No vídeo de hoje vamos conhecer os grupos de status do protocolo HTTP e vamos ver quando e onde usar cada um deles.',
                'content' => 'https://www.youtube.com/embed/rWIOwa-l59o?si=f53_iRtep9eMsnDK" title="YouTube video player"',
                'length' => '01:40:00',
                'is_exam' => true,
            ]);
        }

        if (!Lesson::where('id', 9)->exists()) {
            Lesson::create([
                'module_id' => 7,
                'title' => 'Avaliação de Status e Métodos HTTP',
                'summary' => 'No vídeo de hoje vamos conhecer os grupos de status do protocolo HTTP e vamos ver quando e onde usar cada um deles.',
                'content' => 'https://www.youtube.com/embed/rWIOwa-l59o?si=f53_iRtep9eMsnDK" title="YouTube video player"',
                'length' => '01:40:00',
                'is_exam' => true,
            ]);
        }
    }
}
