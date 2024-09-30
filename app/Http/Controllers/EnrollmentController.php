<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function enroll($courseId)
    {
        $course = Course::findOrFail($courseId);
        $user = auth()->user();

        // Processar matrícula
        $user->courses()->attach($course->id);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('my-courses.index', $course->id)
                         ->with('success', 'Matricula concluída com sucesso!');
    }
}
