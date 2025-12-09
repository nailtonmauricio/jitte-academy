<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LessonVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lessonId)
    {
        // Obtém a aula atual
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            abort(404);
        }

        // Obtém o módulo ao qual a aula pertence
        $module = Module::find($lesson->module_id);

        if (!$module) {
            abort(404);
        }

        // Obtém o ID do curso
        $courseId = $module->course_id;

        // Lógica para aula anterior
        $previousLesson = Lesson::where('module_id', $module->id)
            ->where('id', '<', $lessonId)
            ->orderBy('id', 'desc')
            ->first();

        // Lógica para próxima aula
        $nextLesson = Lesson::where('module_id', $module->id)
            ->where('id', '>', $lessonId)
            ->orderBy('id', 'asc')
            ->first();

        // Atualiza o campo updated_at na tabela lesson_user
        $userId = auth()->user(); // Obtém o ID do usuário autenticado

        // Atualiza o timestamp de updated_at na tabela pivot lesson_user
        $lesson->users()->updateExistingPivot($userId, [
            'updated_at' => now(),
        ]);

        $lessonStatus = $userId->lessons()->where('lesson_id', $lesson->id)->first()->pivot->status;

        // Retorna a view com as variáveis para navegação
        return view('modules.course.view', [
            'menu' => 'meus-cursos',
            'lesson' => $lesson,
            'course_id' => $courseId,
            'previous' => $previousLesson,
            'next' => $nextLesson,
            'lessonStatus' => $lessonStatus,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Inicia a transação
        DB::beginTransaction();

        try {
            // Usuário logado
            $user = auth()->user();

            // Obtém o estudante
            $student = Student::where('user_id', $user->id)->first()->id;

            // Id da lição
            $lesson = Lesson::find($request->lesson_id);

            // Verifica se a lição existe
            if (!$lesson) {
                return response()->json(['message' => 'Lesson not found'], 404);
            }

            // Obtém o módulo ao qual a aula pertence
            $module = Module::find($lesson->module_id);
            $course = $module->course_id;

            // Verifica se o curso existe
            if (!$course) {
                return response()->json(['message' => 'Course not found'], 404);
            }

            // Total de aulas no curso
            $totalLessons = Module::where('course_id', $course)->withCount('lessons')->get()->sum('lessons_count');

            // Calcula o progresso por aula
            $lessonProgress = ceil(100 / $totalLessons);

            // Obtém o progresso atual do usuário no curso (pela tabela pivot 'course_user')
            $coursePivot = $user->courses()->where('course_id', $course)->first();
            $courseProgress = $coursePivot->pivot->progress;
            $updateCourseProgress = $courseProgress + $lessonProgress;

            // Verifica o status atual na tabela pivot 'lesson_user'
            $currentStatus = $user->lessons()->where('lesson_id', $lesson->id)->first()->pivot->status;

            // Verifica se o status já é 1.
            // Tratar esse trecho depois, o mesmo nao está funcionando, condicionei
            if ($currentStatus == 1) {
                return redirect()->route('lesson-video.index', ['lesson' => $lesson->id])->with('toastInfo', 'Aula já concluída!');
            }

            // Atualiza os dados na tabela pivot 'lesson_user'
            $user->lessons()->updateExistingPivot($lesson->id, [
                'status' => $request->status,  // Atualiza o status da lição (por exemplo, 'completed', 'in progress', etc)
                'updated_at' => now()          // Atualiza a data de modificação
            ]);

            // Atualiza o progresso na tabela pivot 'course_user'
            $user->courses()->updateExistingPivot($course, [
                'progress' => $updateCourseProgress > 100 ? 100 : $updateCourseProgress
            ]);

            if ($updateCourseProgress >= 100) {
                Attendance::generateAttendance($student, $course, $user->id);
            }

            // Se tudo ocorreu bem, commit da transação
            DB::commit();

            return redirect()->route('lesson-video.index', ['lesson' => $lesson->id])->with('toastSuccess', 'Aula marcada como concluída!');

        } catch (\Exception $e) {
            // Se algo der errado, rollback da transação
            DB::rollBack();
            return response()->json(['message' => $e], 500);
        }
    }
}
