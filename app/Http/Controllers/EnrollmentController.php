<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /*public function enroll($courseId)
    {
        DB::beginTransaction();

        try {
            $course = Course::findOrFail($courseId);
            $user = auth()->user();

            // Processar matrícula
            $user->courses()->attach($course->id);

            DB::commit();

            // Redirecionar com mensagem de sucesso
            return redirect()->route('my-courses.index', $course->id)
                ->with('success', 'Matricula concluída com sucesso.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('all-courses.index')
                ->with('error', 'Ocorreu um erro ao processar a matrícula.');
        }

    }*/
    public function enroll($courseId)
    {
        DB::beginTransaction();

        try {
            // Buscar o curso
            $course = Course::with('modules.lessons')->findOrFail($courseId);
            $user = auth()->user();

            // Matricular o usuário no curso
            $user->courses()->attach($course->id);

            // Coletar todas as aulas relacionadas ao curso
            $lessons = $course->modules->flatMap(function($module) {
                return $module->lessons;
            });

            // Inserir as aulas na tabela pivot 'lesson_user'
            foreach ($lessons as $lesson) {
                $user->lessons()->attach($lesson->id, [
                    'created_at' => now(),
                    'updated_at' => null,
                ]);
            }

            DB::commit();

            // Redirecionar com mensagem de sucesso
            return redirect()->route('my-courses.index', $course->id)
                ->with('success', 'Matrícula concluída com sucesso.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('all-courses.index')
                ->with('error', 'Ocorreu um erro ao processar a matrícula.');
        }
    }
}
