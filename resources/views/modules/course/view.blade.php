@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-3">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('my-courses.index') }}" class="text-decoration-none">Meus cursos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('course-modules.index', ['course' => $course_id]) }}" class="text-decoration-none">Módulos</a></li>
            <li class="breadcrumb-item active">Aula</li>
        </ol>
    </div>

    <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa-solid fa-book-open"></i>
                        {{ $lesson->title }}
                    </div>
                    <div>
                        <button class="btn btn-sm btn-dark"><i class="fa-solid fa-circle-chevron-left"></i></button>
                        <button class="btn btn-sm btn-dark"><i class="fa-solid fa-circle-chevron-right"></i></button>
                        <form class="form-check-inline me-0" method="POST" action="">
                            @csrf
                            <input type="hidden" value="1">
                            <button class="btn btn-sm btn-dark">Concluir</button>
                        </form>
                    </div>
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

@endsection
