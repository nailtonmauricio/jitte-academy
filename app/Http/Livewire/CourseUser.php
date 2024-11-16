<?php

namespace App\Http\Livewire;

use App\Models\Course;;
use Livewire\Component;
use Livewire\WithPagination;

class CourseUser extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $amount = 6;
    public $search = '';


    /**
     * @return \Illuminate\Container\Container|mixed|object
     */
    public function render()
    {
        // Recupera os cursos filtrando pelo usuário logado e incluindo o campo progress da tabela pivot
        $courses = Course::whereHas('users', function ($query) {
            $query->where('users.id', auth()->user()->id); // Filtra os cursos do usuário logado
        })
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhereHas('subcategory', function ($query) {
                        $query->where('name', 'like', "%{$this->search}%")
                            ->orWhereHas('category', function ($query) {
                                $query->where('name', 'like', "%{$this->search}%");
                            });
                    });
            })
            ->with(['users' => function ($query) {
                $query->where('users.id', auth()->user()->id)
                    ->withPivot('progress'); // Inclui o campo 'progress' da tabela pivot
            }]);

        // Retorna a view com a paginação

        return view('livewire.course-user', [
            'menu' => 'meus-cursos',
            'courses' => $courses->paginate($this->amount)
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
