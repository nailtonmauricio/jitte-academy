<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = [
        'subcategory_id',
        'name',
        'description',
        'card',
        'price',
        'duration',
    ];

    public function courseLength()
    {
        // Realiza a consulta usando os relacionamentos definidos nas models
        return Lesson::join('modules', 'modules.id', '=', 'lessons.module_id')
            ->join('courses', 'courses.id', '=', 'modules.course_id')
            ->where('courses.id', $this->id) // Usa o ID do próprio curso
            ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(lessons.length))) as total_time')
            ->value('total_time'); // Retorna o valor da soma calculada
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('progress', 'updated_at');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    // Método para calcular o total de aulas no curso
    public function totalLessons()
    {
        // Conta o total de aulas relacionadas a todos os módulos deste curso
        return $this->modules()->withCount('lessons')->get()->sum('lessons_count');
    }

    // Método para calcular o progresso por aula
    public function lessonProgress()
    {
        $totalLessons = $this->totalLessons();

        // Evita divisão por zero se não houver aulas
        return $totalLessons > 0 ? ceil(100 / $totalLessons) : 0;
    }
}
