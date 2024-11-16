<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\UserAnswer;
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
    /*public function create(Quiz $quiz)
    {

        // Vamos assumir que user_quiz_id é o id do relacionamento do usuário com o quiz
        $questions = $quiz->questions()->with('answers')->paginate(1); // Uma pergunta por vez
        $quiz_user_id = UserQuiz::getQuizUserId($quiz->id, auth()->user()->id);

        return view('modules.quiz.create', [
            'menu' => 'avaliacao',
            'quiz' => $quiz,
            'questions' => $questions,
            'quiz_user_id' => $quiz_user_id
        ]);
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Quiz $quiz)
    {
        // Valida o ID da resposta
        $validatedData = $request->validate([
            'answer' => 'required|exists:answers,id',
            'current_question' => 'required|integer',
            'user_quiz_id' => 'required|integer',
        ]);

        // Persiste a resposta do usuário
        UserAnswer::create([
            'user_quiz_id' => $request->input('user_quiz_id'),
            'question_id' => $quiz->questions()->skip($request->input('current_question') - 2)->first()->id, // questão anterior
            'answer_id' => $validatedData['answer']
        ]);

        // Verifica se é a última pergunta
        if ($request->input('current_question') > $quiz->questions->count()) {
            return redirect()->route('quiz.result', ['quiz' => $quiz->id]);
        }

        // Redireciona para a próxima questão
        return redirect()->route('answer-quiz.create', [
            'quiz' => $quiz->id,
            'current_question' => $request->input('current_question')
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        // Carrega as questões e respostas relacionadas ao quiz
        $quiz->load('questions.answers');

        return view('quiz.show', compact('quiz'));
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
