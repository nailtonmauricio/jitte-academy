<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RecoverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonVideoController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserQuizController;
use App\Http\Livewire\Course;
use Illuminate\Support\Facades\Route;

###################### ROTAS PÚBLICAS ##########################
Route::group([], function () {
    Route::get('/', [LandingPage::class, 'index'])->name('landing-page.index');
    Route::get('/login/visitor', [LandingPage::class, 'login'])->name('visitor.login');
    Route::get('/curso/{course}', [Course::class, 'index'])->name('course.index');
    Route::post('/', [StudentController::class, 'store'])->name('student.store');
    Route::get('/attendance/validate', [AttendanceController::class, 'validate'])->name('attendance.validate');
    Route::get('/validate/{attendance}', [AttendanceController::class, 'qrValidate'])->name('validate.qrcode');
    Route::post('/validate', [AttendanceController::class, 'directValidate'])->name('validate.link');

    /**
     * Root route
     * Rota raiz, carrega o formulário de login do sistema
     */
    Route::get('/administrativo', [LoginController::class, 'index'])->name('login.index');

    /**
     * Login page route
     * Realiza o processamento do login dos operadores do sistema
     */
    Route::post('/login', [LoginController::class, 'login'])->name('login.process');

    ################## ROTAS DE RECUPERAÇÃO DE SENHA###############
    Route::group([], function () {
        /**
         * Recover root route
         * Rota raiz para recuperação, carrega o formulário de recuperação de senha
         */
        Route::get('/recuperar-senha', [RecoverController::class, 'index'])->name('recover.index');

        /**
         * Send mail route
         * Rota responsável por disparar o e-mail de recuperação
         */
        Route::post('/recover', [RecoverController::class, 'process'])->name('recover.process');

        /**
         * Token route
         * Rota responsável por utilizar o token para redirecionar para formulário de alteração de senha
         */
        Route::get('/recover/{token}/{email}', [RecoverController::class, 'reset'])->name('password.reset');

        /**
         * Change password route
         * Rota que carrega o formulário de alteração de senha e faz o processamento da mesma
         */
        Route::post('/change-password', [RecoverController::class, 'update'])->name('change-password');
    });
    ###############################################################
});
################################################################

###################### ROTAS PROTEGIDAS ########################
Route::group(['middleware' => 'auth'], function () {

    /** Logout page route */
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.process');
    Route::get('/visitor/logout', [LandingPage::class, 'logout'])->name('visitor.logout');

    /** Dashboard route */
    Route::get('/inicio', [HomeController::class, 'index'])->name('home.index');

    ###################### ROTAS DE OPERADORES ########################
    Route::group(['prefix' => 'operadores', 'as' => 'user.'], function () {

        Route::resource('/', UserController::class)->parameters(['' => 'user']);

        // Middleware para rotas específicas
        Route::middleware('permission:user-create')->group(function () {
            Route::get('/novo', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
        });

        Route::middleware('permission:user-edit')->group(function () {
            Route::get('/{user}/editar', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
        });

        Route::middleware('permission:user-delete')->group(function () {
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        });
    });
    ###################################################################


    /** Rotas do perfil */
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update');

    /** Rotas dos níveis de acesso */
    Route::resource('/niveis-acesso', RoleController::class)->names('role')->parameters([
        'niveis-acesso' => 'role',
    ]);

    /** Rotas das permissões */
    Route::get('/permissoes/{role}', [RolePermissionController::class, 'index'])->name('role-permission.index')->middleware('permission:role-index');
    Route::post('/permissoes/{role}/{permission}', [RolePermissionController::class, 'update'])->name('role-permission.update')->middleware('permission:role-update');

    /** Rotas dos cursos e aulas */
    Route::get('/cursos', [LandingPage::class, 'index'])->name('all-courses.index');
    Route::post('/cursos/{course}/matricula', [EnrollmentController::class, 'enroll'])->name('course.enroll');
    Route::get('/meus-cursos', [StudentController::class, 'index'])->name('my-courses.index');
    Route::get('/curso/{course}/modulos', [ModuleController::class, 'index'])->name('course-modules.index');
    Route::get('/aula/{lesson}/video', [LessonVideoController::class, 'index'])->name('lesson-video.index');
    Route::get('/aula/{lesson}/avaliacao', [QuizController::class, 'findByLesson'])->name('final-lesson.create');
    Route::patch('/aula', [LessonVideoController::class, 'update'])->name('lesson-video.update');

    /** Rota de downloads de material */
    Route::get('/cursos/{course}/download', [Course::class, 'download'])->name('course-files.download');

    /** Rotas dos declarações */
    Route::get('/declaracoes', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/declaracao/{course}', [AttendanceController::class, 'show'])->name('attendance.show');

    /** Rota para certificados */
    Route::get('/certificados', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('/certificado/{course}', [CertificateController::class, 'show'])->name('certificate.show');

    /** Rotas para avaliações */
    Route::get('/avaliacoes', [UserQuizController::class, 'index'])->name('quiz.index');
    #Route::get('/avaliacao/{quiz}', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/answer', [UserAnswerController::class, 'store'])->name('answer.store');
});
################################################################
