<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    protected $fillable = [
        'question_id',
        'answer_text',
        'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public static function isCorrect($questionId, $answerId)
    {
        return self::where('question_id', $questionId)
            ->where('id', $answerId)
            ->where('is_correct', true)
            ->exists();
    }
}
