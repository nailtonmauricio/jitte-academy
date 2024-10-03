<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lessonId)
    {
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            abort(404);
        }

        $module = Module::find($lesson->module_id);

        if (!$module) {
            abort(404);
        }

        $courseId = $module->course_id;

        return view('modules.course.view', [
            'menu' => 'meus-cursos',
            'lesson' => $lesson,
            'course_id' => $courseId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
