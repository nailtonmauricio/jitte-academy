<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lesson AS LessonModel;

class Lesson extends Component
{
    public $moduleId;
    public $lessons = [];


    // Este método é chamado quando o componente é montado
    public function mount($moduleId)
    {
        $this->moduleId = $moduleId;
        $this->loadLessons();
    }

    // Método que busca as aulas no banco de dados
    public function loadLessons()
    {
        // Obter o usuário autenticado
        $user = auth()->user();

        // Carregar as aulas do módulo e os dados da tabela pivô para o usuário
        $this->lessons = LessonModel::where('module_id', $this->moduleId)
            ->with(['users' => function ($query) use ($user) {
                $query->where('user_id', $user->id); // Filtrar pelo usuário autenticado
            }])
            ->get();
    }

    // Método de renderização do componente
    public function render()
    {
        return view('livewire.lesson', [
            'lessons' => $this->lessons
        ]); // Retorna a view do componente
    }
}
