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
                'summary' => 'O Markdown pode ser utilizado para criar estilos prorpios e deixar os arquivos de  Readme mais atrativos.
Ele possui diversos recursos que seram abordados durante todo o treinamento, sendo eles:
Títulos
Os títulos são criados usando o símbolo #. O número de # indica o nível do título (de 1 a 6).
Ênfase
Para adicionar ênfase ao texto, você pode usar asteriscos (*) ou underscores (_):
Listas
Listas não ordenadas
São criadas usando -, * ou +:
Listas ordenadas
São criadas usando números seguidos de um ponto (.):',
                'content' => 'https://www.youtube.com/embed/Wj_1cGqy8js?si=1y4gRpt7Hmrm4TOX" title="YouTube video player"',
                'length' => '00:20:00'
            ]);
        }
    }
}
