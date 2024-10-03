@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Cursos</li>
        </ol>
    </div>

    @livewire('course')
@endsection
