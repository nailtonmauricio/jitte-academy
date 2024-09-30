<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(8);
        return view('modules.home.student.index', ['menu' => 'meus-cursos', 'courses' => $courses]);
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
    public function store(StoreStudentRequest $request)
    {
        $request->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Cadastrar no banco de dados na tabela usuários
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Cadastra o nivel de acesso na tabela papeis
            $user->assignRole(4);
            $lastInsertId = $user->id;

            Log::info('Usuário cadastrado.', ['id' => $user->id, $user]);

            Student::create([
                'user_id' => $lastInsertId,
                'name' => $request->name,
                'contact' => $request->contact,
                'registration' => date('Y').$lastInsertId,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('landingPage.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::info('Usuário não cadastrado.', ['error' => $e->getMessage()]);

            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }


}
