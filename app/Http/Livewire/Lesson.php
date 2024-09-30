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
        $this->lessons = LessonModel::where('module_id', $this->moduleId)->get();
    }

    // Método de renderização do componente
    public function render()
    {
        return view('livewire.lesson'); // Retorna a view do componente
    }
}
