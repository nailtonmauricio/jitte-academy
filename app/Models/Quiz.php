<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $fillable = [
      'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_quizzes')
            ->withPivot('score') // Adicione colunas extras, se necessário
            ->withTimestamps();
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
