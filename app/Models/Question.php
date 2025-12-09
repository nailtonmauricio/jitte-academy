<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = [
        'quiz_id',
        'question_text'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->inRandomOrder();
    }

    // contar quantas questoes tem por curso
    public static function calculateQuestionValue($quizId)
    {
        $totalQuestions = self::where('quiz_id', $quizId)->count();
        return $totalQuestions > 0 ? 100 / $totalQuestions : 0; // Evita divisão por zero
    }

}
