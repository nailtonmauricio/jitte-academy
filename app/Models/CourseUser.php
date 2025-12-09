<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;

    protected $table = 'course_user';
    protected $fillable = ['user_id', 'lesson_id'];

    // Como essa tabela não possui uma coluna 'id', defina a chave primária composta
    public $incrementing = false;
    protected $primaryKey = ['user_id', 'lesson_id'];

    // Desabilite timestamps automáticos, se necessário
    public $timestamps = true;
}
