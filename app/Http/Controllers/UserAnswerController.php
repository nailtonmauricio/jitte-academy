<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\LessonUser;
use App\Models\Student;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #dd($request->all());
        $currentPage = $request->input('page', 1);
        $lastPage = $request->input('lastPage');
        $courseId = $request->input('course_id');

        // O problema está nessa validação
        /*$validated = $request->validate([
            'user_quiz_id' => 'required|exists:quizzes,id',
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
        ]);*/

        $validated = $request->validate([
            'user_quiz_id' => 'required',
            'question_id' => 'required',
            'answer_id' => 'required',
        ]);

        UserAnswer::create([
            'user_quiz_id' => $validated['user_quiz_id'],
            'question_id' => $validated['question_id'],
            'answer_id' => $validated['answer_id'],
        ]);


        // Avance para a próxima página
        $nextPage = $currentPage + 1;

        // Obtenha a próxima questão ou indique o fim do quiz
        if ($nextPage > $lastPage) {
            #dd($request);
            // na model lesson_user fazer o update do status [user_id, lesson_id, status]
            LessonUser::where('user_id', auth()->user()->id)
                ->where('lesson_id', $request->lesson_id)
                ->update(['status' => 1]);

            // obtendo o valor para setar o progresso por aula concluída
            $course = Course::find($courseId);
            $course->totalLessons();
            $lessonProgress = $course->lessonProgress();

            // obtendo o valor atual
            $courseUser = CourseUser::where('user_id', auth()->user()->id)
                ->where('course_id', $courseId)
                ->first();

            #dd($courseUser->progress);
            $newProgress = $courseUser->progress + $lessonProgress;
            // na model course_user fazer o update no progress [user_id, course_id, progress]
            CourseUser::where('user_id', auth()->user()->id)
                ->where('course_id', $request->course_id)
                ->update(['progress'=> $newProgress]);

            // na model attendances fazer o insert [course_id, student_id, validate_code]
            $student = Student::where('user_id', auth()->user()->id)->first();

            if ($newProgress >= 100) {
                Attendance::generateAttendance($student->id, $courseId, auth()->user()->id);
            }

            // na model certificates fazer o insert [course_id, student_id, validate_code]
            if ($newProgress >= 100) {
                Certificate::generateCertificate($student->id, $courseId, auth()->user()->id);
            }


            return redirect()->route('course-modules.index', ['course' => $courseId])
                ->with('success', 'Parabéns, você concluiu a avaliação com sucesso.');
        }

        return redirect()->route('final-lesson.create', ['page' => $nextPage, 'lesson' =>$request->lesson_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAnswer $userAnswer)
    {
        //
    }
}
