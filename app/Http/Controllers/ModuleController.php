<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index($courseId)
    {
        // Suponha que você tenha um modelo Course e deseja recuperar o curso pelo ID
        $course = Course::findOrFail($courseId);
        $modules = Module::where('course_id', $course->id)->get();
        

        return view('modules.course.show', [
            'menu'=>'meus-cursos',
            'course' =>$course,
            'modules' => $modules
            ]
        );
    }
}
