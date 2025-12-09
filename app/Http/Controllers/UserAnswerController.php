<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Attendance;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\LessonUser;
use App\Models\Question;
use App\Models\Student;
use App\Models\UserAnswer;
use App\Models\UserQuiz;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #dd($request->all());
        $currentPage = $request->input('page', 1);
        $lastPage = $request->input('lastPage');
        $courseId = $request->input('course_id');

        $validated = $request->validate([
            'user_quiz_id' => 'required',
            'question_id' => 'required',
            'answer_id' => 'required',
        ]);
        // Traz o score atual do curso
        $courseScore = UserQuiz::where('user_id', auth()->user()->id)
                         ->where('quiz_id', $request->user_quiz_id)
                         ->first();

        // Traz o valor de cada questão por curso
        // Instancia a model Question e chama o método
        $questionModel = new Question();
        $valuePerQuestion = $questionModel->calculateQuestionValue($request->quiz_id);

        //verifica se a resposta esta correta, se estiver, atualiza o score
        $answerModel = new Answer();
        $correctAnswer = $answerModel->isCorrect($request->question_id, $request->answer_id);
        if ($correctAnswer) {
            $score = $courseScore->score + $valuePerQuestion;
            UserQuiz::where('user_id', auth()->user()->id)
                    ->where('quiz_id', $request->user_quiz_id)
                    ->update(['score' => $score]);
        }

        // Faz a persistência dos dados na tabela user_answers
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

            // verifica se já existe o registro de validação
            $attendanceValidate = Attendance::where('student_id', $student->id)
                                            ->where('course_id', $course->id)
                                            ->exists();
            if (!$attendanceValidate) {
                if ($newProgress >= 100) {
                    Attendance::generateAttendance($student->id, $courseId, auth()->user()->id);
                }
            }

            // verifica se já existe o registro de validacao do certificado
            $certificateValidate = Certificate::where('student_id', $student->id)
                                                ->where('course_id', $course->id)
                                                ->exists();
            if (!$certificateValidate) {
                // na model certificates fazer o insert [course_id, student_id, validate_code]
                if ($newProgress >= 100) {
                    Certificate::generateCertificate($student->id, $courseId, auth()->user()->id);
                }
            }

            return redirect()->route('course-modules.index', ['course' => $courseId])
                ->with('success', 'Parabéns, você concluiu a avaliação com sucesso.');
        }

        return redirect()->route('final-lesson.create', ['page' => $nextPage, 'lesson' =>$request->lesson_id]);
    }
}
