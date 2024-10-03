@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('all-courses.index') }}" class="text-decoration-none">Cursos</a></li>
            <li class="breadcrumb-item active">Meus cursos</li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>

    @livewire('course-user')
@endsection
