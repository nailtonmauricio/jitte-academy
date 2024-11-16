<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::whereHas('users', function ($query) {
            // Filtra os cursos do usuário logado
            $query->where('users.id', auth()->user()->id)
                ->where('course_user.progress', '>=', 100); // Filtra pelo progresso na tabela pivot 'course_user'
        })
            ->with(['users' => function ($query) {
                // Inclui apenas o usuário logado e traz o campo 'progress' da tabela pivot
                $query->where('users.id', auth()->user()->id)
                    ->withPivot('progress', 'created_at', 'updated_at') // Inclui o campo 'progress' no retorno
                    ->where('course_user.progress', '>=', 100); // Filtra pelo progresso na tabela pivot
            }])
            ->paginate(8);

        // dd($courses);
        return view('modules.attendance.index', ['menu'=>'declaracao', 'courses'=>$courses]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca o curso com base no ID passado
        $course = Course::findOrFail($id);

        // Calcula a duração do curso
        $courseLength = $course->courseLength();

        // Recuperar os módulos do curso
        $modules = Module::where('course_id', $course->id)
            ->with('lessons')
            ->get();

        // Supondo que o usuário autenticado está relacionado ao curso
        $user = auth()->user();

        // Recupera o registro associado ao estudante (relacionamento 1:1 com User)
        $student = $user->student; // Acessa o modelo Student através do relacionamento hasOne

        // Busca o registro da tabela pivot usando o relacionamento belongsToMany
        $courseUserPivot = $course->users()
            ->where('user_id', $user->id)
            ->withPivot('created_at', 'updated_at') // Inclui os campos da tabela pivot
            ->firstOrFail();

        // Busca o registro de Attendance (presença) com base no course_id e student_id
        $attendance = Attendance::where('course_id', $course->id)
            ->where('student_id', $student->id) // Usa o ID do estudante
            ->first();

        // Verifica se a presença foi encontrada
        if (!$attendance) {
            $attendance = null;
        }

        // Cria uma instância do mPDF
        $mpdf = new Mpdf();
        $mpdf->SetBasePath(public_path());

        // Gera o QR Code
        $qrCodeUrl = "https://academy.talem.com.br/attendance/validate/{$attendance->validate_code}";
        $qrCode = new QrCode($qrCodeUrl);
        $qrCodeOutput = (new Output\Png)->output($qrCode, 210);

        // Converte a imagem do QR Code para Base64
        $qrCodeBase64 = base64_encode($qrCodeOutput);
        $qrCodeImage = 'data:image/png;base64,' . $qrCodeBase64;

        // Monta o conteúdo do PDF a partir de uma view
        $html = view('modules.attendance.show', [
            'course' => $course,
            'courseUser' => $courseUserPivot->pivot, // Acessa os dados da pivot
            'student' => $student, // Passa o modelo Student para a view
            'courseLength' => $courseLength, // Tamanho em horas, do curso
            'modules' => $modules,
            'attendance' => $attendance, // Passa a presença (attendance) para a view
            'qrcode' => $qrCodeImage, // Passa a imagem do QR Code em Base64
        ])->render();

        // Escreve o conteúdo HTML no PDF
        $mpdf->WriteHTML($html);

        // Exibe o PDF no navegador
        $mpdf->Output('declaracao-de-curso.pdf', 'I');
    }

    public function validate()
    {
        return view('modules.attendance.validate');
    }

    public function qrValidate(Request $request)
    {
        $attendanceCode = $request->route('attendance');
        $result = Attendance::where('validate_code', $attendanceCode)->first();

        if (!$result) {
            return back()->with('error', 'Documento '.$attendanceCode.' não validado.');
        }

        return back()->with('success', 'Documento n'.$attendanceCode.' validado com sucesso!<br>'.hash('sha256', $attendanceCode));
    }

    public function directValidate(Request $request)
    {
        $result = Attendance::where('validate_code', $request->validateCode)->first();

        if (!$result) {
            return back()->withInput()->with('error', 'O documento '.$request->validateCode.' não pode ser validado.');
        }

        return back()->with('success', 'O documento '.$request->validateCode.' é autêntico!'.hash('sha256', $request->validateCode));
    }
}
