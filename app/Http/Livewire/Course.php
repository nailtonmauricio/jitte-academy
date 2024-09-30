<?php

namespace App\Http\Livewire;

use App\Models\Course AS CourseModel;
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
        $course = CourseModel::findOrFail($courseId);

        // Passa os dados do curso para a view
        return view('modules.course.show', compact('course'));
    }

    public function show($courseId)
    {
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
}
