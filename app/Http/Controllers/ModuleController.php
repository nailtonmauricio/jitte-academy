<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Module;

class ModuleController extends Controller
{

    public function index($courseId)
    {
        // Recuperar o curso
        $course = Course::findOrFail($courseId);
        $courseUser = CourseUser::where('course_id', $courseId)
                                ->where('user_id', auth()->user()->id)
                                ->first();

        // Recuperar os módulos do curso
        $modules = Module::where('course_id', $course->id)
                        ->with('lessons')
                        ->get();

        // Obter o usuário autenticado
        $user = auth()->user();
        // Carregar as lições do usuário junto com os dados da tabela pivot
        $userLessons = $user->lessons()->whereIn('lesson_id', $modules->pluck('lessons.*.id')->flatten())->get();

        // Para cada módulo, buscar as aulas e os valores da tabela pivot
        foreach ($modules as $module) {
            foreach ($module->lessons as $lesson) {
                // Tentar encontrar a entrada correspondente na tabela pivot
                $pivotData = $user->lessons()->where('lesson_id', $lesson->id)->first();

                // Verificar se o usuário está matriculado na aula
                if ($pivotData) {
                    // Adicionar os dados da tabela pivot ao objeto da aula
                    $lesson->pivot = $pivotData; // Isso adiciona os dados da tabela pivot ao objeto Lesson
                }
            }
        }

        return view('modules.course.show', [
            'menu'      => 'meus-cursos',
            'course'    => $course,
            'courseUser'=> $courseUser,
            'modules'   => $modules,
            'lessons'   => $userLessons,
        ]);
    }
}
