@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-3">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('my-courses.index') }}" class="text-decoration-none">Meus cursos</a></li>
            <li class="breadcrumb-item active">Aulas</li>
            <li class="breadcrumb-item active">Assistir</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-book-open"></i>
                    {{ $lesson->title }}
                </div>
                <div class="card-body">
                    <div class="ratio ratio-16x9">
                        <iframe src="{{ $lesson->content }}" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $lesson->summary }}
                </div>
            </div>
        </div>

    </div>

@endsection
