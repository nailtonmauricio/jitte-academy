<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\UserQuiz;
use Illuminate\Http\Request;

class QuizController extends Controller
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
    public function create(Quiz $quiz)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Quiz $quiz)
    {
        //
    }


    /**
     * Display the specified resource.
     */
   public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    public function findByLesson($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $quiz = Quiz::findOrFail($lesson->module->course_id);
        $questions = $quiz->questions()->with('answers')->paginate(1); // Uma pergunta por vez
        $quiz_user_id = UserQuiz::getQuizUserId($quiz->id, auth()->user()->id);

        return view('modules.quiz.create', [
            'menu' => 'meus-cursos',
            'quiz' => $quiz,
            'questions' => $questions,
            'quiz_user_id' => $quiz_user_id,
            'lesson_id' => $lesson->id
        ]);
    }
}
