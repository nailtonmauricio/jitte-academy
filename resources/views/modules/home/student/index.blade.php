@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Meus cursos</a></li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>

    @livewire('course-user')
@endsection
