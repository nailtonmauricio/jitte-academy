<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserQuiz;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::whereHas('users', function ($query) {
            // Filtra os quizzes do usuário logado
            $query->where('users.id', auth()->user()->id);
        })
            ->with(['users' => function ($query) {
                $query->where('users.id', auth()->user()->id)
                    ->select('users.id', 'users.name') // Seleciona os campos de `users` que você precisa
                    ->withPivot('score', 'created_at', 'updated_at'); // Estes campos são acessíveis na coleção de pivot depois
            }])
            ->paginate(8);

        return view('modules.quiz.index', ['menu'=>'avaliacao', 'quizzes' => $quizzes]);
    }
}
