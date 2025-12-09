<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';
    protected $fillable = [
        'course_id',
        'name',
        'summary',
    ];

    public function isCompletedByUser($userId)
    {
        return $this->lessons->every(function ($lesson) use ($userId) {
            $pivot = $lesson->users()->where('user_id', $userId)->first()?->pivot;
            return $pivot && $pivot->status == 1;
        });
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
