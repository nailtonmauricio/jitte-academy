@extends('templates.academy.index')
@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-1">
            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item active"><a href="{{ route('all-courses.index') }}" class="text-decoration-none">Cursos</a></li>
                <li class="breadcrumb-item active">{{ $course->id }}</li>
                <li class="breadcrumb-item active">Detalhes</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header hstack gap-2">
                <h1>{{ $course->name }}</h1>
            </div>
            <div class="card-body">
                <x-alert/>
                <div class="row">
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <figure class="figure">
                            <img src="{{ $course->card }}" class="figure-img img-fluid rounded" alt="{{ $course->name }}">
                        </figure>
                    </div>

                    <div class="col-12 col-md-8">

                        <p>{{ $course->description }}</p>
                        <p>
                            <strong>Tempo estimado em videoaulas: {{ $courseLength }}</strong><br>
                            @if(!$course->price == '00.0')
                            <strong>Investimento : {{ number_format($course->price, 2, ',', '.') }}</strong>
                            @endif
                        </p>

                        @if(auth()->check())
                            <form action="{{ route('course.enroll', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary bg-gradient">Inscrever-se</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
