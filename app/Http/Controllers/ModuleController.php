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

        // Obter a associação do curso com o usuário
        $courseUser = CourseUser::where('course_id', $courseId)
            ->where('user_id', auth()->id())
            ->first();

        // Recuperar os módulos do curso, ordenados
        $modules = Module::where('course_id', $course->id)
            ->with('lessons')
            ->orderBy('order', 'asc')
            ->get();

        // Obter o ID do usuário autenticado
        $userId = auth()->id();

        // Adicionar o status de conclusão a cada módulo
        $modules->each(function ($module) use ($userId) {
            $module->is_completed = $module->isCompletedByUser($userId);
        });

        // Controlar o bloqueio de acesso
        $modules->each(function ($module, $index) use ($modules) {
            $module->is_accessible = $index === 0 || $modules[$index - 1]->is_completed;
        });

        // Carregar as lições do usuário autenticado
        $userLessons = auth()->user()
            ->lessons()
            ->whereIn('lesson_id', $modules->pluck('lessons.*.id')->flatten())
            ->get();
        //dd($modules);
        // Retornar a view com os dados necessários
        return view('modules.course.show', [
            'menu'       => 'meus-cursos',
            'course'     => $course,
            'courseUser' => $courseUser,
            'modules'    => $modules,
            'lessons'    => $userLessons,
        ]);
    }
}
