<?php

namespace App\Http\Livewire;

use App\Models\Course AS CourseModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Course extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $amount = 6;
    public $search = '';


    public function index($courseId)
    {
        // Suponha que você tenha um modelo Course e deseja recuperar o curso pelo ID
        $course = CourseModel::with('modules.lessons')->findOrFail($courseId);

        $courseLength = $course->courseLength();

        // Passa os dados do curso para a view
        return view('modules.course.index', compact('course', 'courseLength'));
    }

    public function show($courseId)
    {
        // Usar este método posteriormente para substituir o index, aqui é o local correto para mostrar os detalhes dos cursos.
        dd($courseId);
    }

    /**
     * @return \Illuminate\Container\Container|mixed|object
     */
    public function render()
    {
        $courses = CourseModel::query();

        // Verifica se o usuário está autenticado
        if (auth()->check()) {
            $user = auth()->user(); // Obtém o usuário logado

            // Exclui cursos em que o usuário já está matriculado
            $courses->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }

        // Aplica a filtragem por nome, subcategoria e categoria
        $courses->when($this->search, function ($query) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhereHas('subcategory', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhereHas('category', function ($query) {
                            $query->where('name', 'like', "%{$this->search}%");
                        });
                });
        });

        // Ordena e pagina os resultados
        $courses = $courses->inRandomOrder()->paginate($this->amount);

        return view('livewire.course', [
            'menu' => 'cursos',
            'courses' => $courses
        ]);
    }


    /**
     *
     */
    public function loadMore()
    {
        $this->amount += 3;
    }

    public function download($courseId)
    {
        // Caminho do diretório onde o arquivo está armazenado
        $filePath = 'public/courses/' . $courseId .'/course_files.zip';

        // Verifica se o arquivo existe
        if (Storage::exists($filePath)) {
            return Storage::download($filePath, 'course_files.zip');
        }

        // Retorna um erro se o arquivo não for encontrado
        return back()->with('toastInfo', 'Oops! Não existem arquivos para download.');
    }
}
