<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\StringManipulation\Pass\RemoveBuiltinMethodsThatAreFinalPass;

class UserQuiz extends Model
{
    use HasFactory;

    protected $table = 'user_quizzes';
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Método para obter o quiz_user_id
    public static function getQuizUserId($quiz_id, $user_id)
    {
        $quizUser = self::where('quiz_id', $quiz_id)
            ->where('user_id', $user_id)
            ->first();

        return $quizUser ? $quizUser->id : null;
    }
}
