<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'student_id',
        'validate_code',
    ];

    public static function generateAttendance($student, $course, $user)
    {
        $validateCode = date('Y') . $student . $course . $user;

        return self::create([
            'course_id' => $course,
            'student_id' => $student,
            'validate_code' => $validateCode
        ]);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
